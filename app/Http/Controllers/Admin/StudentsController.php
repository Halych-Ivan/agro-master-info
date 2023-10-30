<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentsRequest;
use App\Models\Group;
use App\Models\Program;
use App\Models\SelectedSubject;
use App\Models\Student;
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
        $subjects = $student->group->program->subjects
            ->sortBy('code')
            ->sortByDesc('is_main')
            ->sortByDesc('control')
            ->sortBy('semester');

        $subjects_1 = $student->group->program->subjects->where('is_main', 1)->sortBy('semester')->load('selectedSubject');
        $subjects_2 = $student->group->program->subjects->where('is_main', 0);


        $subjects_3 = $student->group->program->subjects
            ->where('is_main', 2)
            ->sortBy('semester')
            ->sortByDesc('control')
            ;

        $mandatorySubjects = $subjects_3->merge($subjects_1)
            ->groupBy('semester');

        $sel_sub = SelectedSubject::with('student_id', $student);


        return view('admin.students.show', compact('student', 'subjects', 'subjects_1', 'subjects_2' , 'mandatorySubjects', 'sel_sub'));
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
}
