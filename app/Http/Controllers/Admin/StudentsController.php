<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentsRequest;
use App\Models\Group;
use App\Models\Program;
use App\Models\SelectedSubject;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function index()
    {
        $size = request('size') ?? 20;
        $search = request('search') ?? false;
        $group = request('group') ?? false;
        $this->filter($search, 'search');
        $this->filter($group, 'group');

        $searchStudentTitle = session('search') ?? '';
        $searchGroupId = session('group') ?? '';

        $students = Student::whereHas('group', function ($q) use ($searchGroupId) {
            $q->where('id', 'like', '%' . $searchGroupId . '%');})
            ->where('name', 'like', '%' . $searchStudentTitle . '%')
            ->orderBy('surname')
            ->paginate($size);

        $groups = Group::query()->select('id', 'title')->orderBy('title', 'asc')->get();
        return view('admin.students.index', compact('students', 'groups'));
    }


    public function create(Student $student)
    {
        $groups = Group::all();
        $programs = Program::orderBy('year', 'desc')->get();
        return view('admin.students.form', compact( 'student','groups', 'programs'));
    }


    public function store(StudentsRequest $request, Student $student)
    {
        $data = $request->validated();
        $this->save($data, $student, 'uploads/students');
        return redirect()->route('admin.students.show', $student->id);
    }


    public function show(Student $student)
    {
        $programID = $student->group->program->id;

        $subjects = $student->subjects()
            ->withPivot('instead', 'program', 'semester')
            ->wherePivot('program', $programID)
//            ->orderBy('pivot_semester', 'asc')
            ->orderBy('semester', 'asc')
            ->orderBy('is_main', 'desc')
            ->orderBy('control', 'desc')
            ->orderBy('title', 'asc')
            ->get();

//        foreach($subjects as $key => $subject){
//            $subjects[$key] = $subject->pivot->semester;
//        }


        $selected_subjects = array();
        foreach ($subjects as $subject) {
            $insteadId = $subject->pivot->instead ?? null;
            if ($insteadId !== null) {
                $subjectModel = Subject::find($insteadId);
                if ($subjectModel) {
                    $selected_subjects[$insteadId] = $subjectModel;
                }
            }
        }

        $selective_subjects = $student->group->program->subjects->whereIn('is_main', [0]);

        return view('admin.students.show', compact('student', 'subjects', 'selected_subjects', 'selective_subjects'));
    }


    public function edit(Student $student)
    {
        $groups = Group::all();
        $programs = Program::orderBy('year', 'desc')->get();
        return view('admin.students.form', compact( 'student','groups', 'programs'));
    }


    public function update(StudentsRequest $request, Student $student)
    {
        $data = $request->validated();
        $this->save($data, $student, 'uploads/students');

        return redirect()->route('admin.students.show', $student->id);
    }


    public function destroy(Student $student)
    {

    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Вибір дисциплін
     */
    public function select(Request $request, $id)
    {
        $request->validate([
            'sub' => 'required',
            'sel' => 'required',
        ]);

        $sub = $request->input('sub'); // Дисципліна по плану
        $sel = $request->input('sel'); // Вибіркова дисципліна

        $subject = Subject::find($sel);
//        dd($subject->program->id);
        $student = Student::find($id);

        $insteads = $student->subjects()->withPivot('instead')->get();
        foreach ($insteads as $instead) {
            $insteadId = $instead->pivot->instead;
            if ($insteadId == $sel) {
                return redirect()->back()->with('Вже обрано');
            }
        }

        $student->subjects()->syncWithoutDetaching([$sub => [
            'instead' => $sel,
            'semester' => $subject->semester,
            'program' => $subject->program->id,
            'is_main' => 3]]);
        $student->subjects()->syncWithoutDetaching([$sel => [
            'instead' => $sub,
            'semester' => $subject->semester,
            'program' => $subject->program->id,
            'is_main' => 0]]);

        return redirect()->back();
    }



    public function update_plan($id)
    {
        $student = Student::find($id);
        $this->del_subjects($student); // видаляємо всі предмети
        $this->add_subjects($student); // додаємо предмети вдповідно до групи та програми
        return redirect()->back();
    }


    /**
     * @param $student
     * @return void
     * Додаємо студенту його дисципліни відповідно до група-програма-дисципліни із статусом 2 та 1 (основні та для вибору)
     */
    private function add_subjects($student)
    {
        $subjects = $student->group->program->subjects->whereIn('is_main', [2, 1]);

        foreach($subjects as $subject){

            $main = $student->subjects->find($subject->id) ?
                $student->subjects->find($subject->id)->pivot->is_main :
                $subject->is_main;

            $student->subjects()->syncWithoutDetaching([$subject->id =>[
                'semester' => $subject->semester,
                'program' => $subject->program->id,
                'is_main' => $main??3]]);
        }
    }


    /**
     * @param $student
     * @return void
     * Видаляємо всі предмети студента. При зміні групи. Залишаються обрані вибіркові
     */
    private function del_subjects($student)
    {
        $student->subjects()
            ->whereIn('is_main', [2, 1])
//            ->wherePivot('instead', '==', null)
            ->wherePivot('is_main', 2)
            ->orWherePivot('is_main', 1)
            ->detach();
    }
}
