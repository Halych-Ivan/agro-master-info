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
            ->where('surname', 'like', '%' . $searchStudentTitle . '%')
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
        $groups = Group::orderBy('name', 'asc')->get();
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



    public function audit()
    {
        set_time_limit(3600); // Збільшення максимального часу виконання на 120 секунд

        $students = Student::all();
        foreach ($students as $student){
            //$this->del_subjects($student); // видаляємо всі предмети
            //$this->add_subjects($student); // додаємо предмети вдповідно до групи та програми
            $student->is_active = 0;
            $student->save();

            sleep(20);
        }

        return redirect()->route('admin.students.index');
    }

    public function update_plan($id)
    {
        $student = Student::find($id);
        $this->del_subjects($student); // видаляємо всі предмети
        $this->add_subjects($student); // додаємо предмети вдповідно до групи та програми
        $student->is_active = 1;
        $student->save();

        return redirect()->back();
    }


    private function del_subjects($student)
    {

//        $student->subjects()->wherePivot('is_main', 0)->detach();
        $student->subjects()->wherePivot('is_main', 1)->detach();
        $student->subjects()->wherePivot('is_main', 2)->detach();
        $student->subjects()->wherePivot('is_main', 3)->detach();
    }


    private function add_subjects($student)
    {
        $subjects = $student->group->program->subjects->whereIn('is_main', [2, 1]);
        $data = [];

        foreach($subjects as $subject){

            $main = $student->subjects->find($subject->id) ?
                $student->subjects->find($subject->id)->pivot->is_main :
                $subject->is_main;

            $data[] = [
                'student_id' => $student->id,
                'subject_id' => $subject->id,
                'semester' => $subject->semester,
                'program' => $subject->program->id,
                'is_main' => $main ?? 3,
            ];
        }

        // Використання пакетної вставки
        $student->subjects()->syncWithoutDetaching($data);
    }


}
