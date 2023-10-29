<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentsRequest;
use App\Models\Group;
use App\Models\Program;
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

        $selectSubjectsCountBySemester = $subjects
            ->filter(function ($subject) {
                return $subject->is_main == 1;
            })
            ->groupBy('semester')
            ->map(function ($semesterSubjects) {
                return $semesterSubjects->count();
            });

        $selectSubjectsBySemester = $subjects
            ->filter(function ($subject) {
                return $subject->is_main == 0;
            })->groupBy('semester');

        //dd($selectSubjectsBySemester);

        return view('admin.students.show', compact('student', 'subjects', 'selectSubjectsCountBySemester', 'selectSubjectsBySemester'));
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
