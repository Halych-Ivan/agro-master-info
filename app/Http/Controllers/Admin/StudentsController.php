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
        $searchGroupId = session('cathedra') ?? '';

        $students = Student::whereHas('group', function ($q) use ($searchGroupId) {
            $q->where('id', 'like', '%' . $searchGroupId . '%');})
            ->where('name', 'like', '%' . $searchStudentTitle . '%')
            ->orderBy('name')
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
        return view('admin.students.show', compact('student'))->with('alert', 'Дія виконана успішно!');

    }


    public function show(Student $student)
    {
        //
    }


    public function edit(Student $student)
    {
        //
    }


    public function update(StudentsRequest $request, Student $student)
    {
        //
    }


    public function destroy(Student $student)
    {
        //
    }
}
