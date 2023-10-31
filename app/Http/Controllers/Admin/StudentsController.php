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
        $this->add_subjects($student); //

        $subjects = $student->subjects()->withPivot('instead')
            ->orderBy('semester', 'asc')
            ->orderBy('is_main', 'desc')
            ->orderBy('control', 'desc')
            ->orderBy('title', 'asc')
            ->get();

        $selected_subjects = array();
        foreach ($subjects as $subject) {
            $insteadId = $subject->pivot->instead;
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


    public function select(Request $request, $id)
    {
        $request->validate([
            'sub' => 'required',
            'sel' => 'required',
        ]);

        $sub = $request->input('sub');
        $sel = $request->input('sel');

        $subject = Subject::find($sel);
        $student = Student::find($id);

        $insteads = $student->subjects()->withPivot('instead')->get();
        foreach ($insteads as $instead) {
            $insteadId = $instead->pivot->instead;
            if ($insteadId == $sel) {
                return redirect()->back()->with('Вже обрано');
            }
        }

        $student->subjects()->syncWithoutDetaching([$sub => ['instead' => $sel, 'semester' => $subject->semester, 'is_main' => $subject->is_main]]);
        $student->subjects()->syncWithoutDetaching([$sel => ['is_main' => 0]]);

        return redirect()->back();
    }


    private function add_subjects($student)
    {
        $subjects = $student->group->program->subjects->whereIn('is_main', [2, 1]);
        foreach($subjects as $subject){
            $student->subjects()->syncWithoutDetaching([$subject->id =>['semester' => $subject->semester, 'is_main' => $subject->is_main]]);
        }
    }
}
