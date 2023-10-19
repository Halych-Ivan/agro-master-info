<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeachersRequest;
use App\Models\Cathedra;
use App\Models\Teacher;

class TeachersController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }


    public function create(Teacher $teacher)
    {
        $cathedras = Cathedra::all();
        return view('admin.subjects.form', compact('teacher',  'cathedras'));
    }


    public function store(TeachersRequest $request, Teacher $teacher)
    {
        $data = $request->validated();
        $this->save($data, $teacher, 'uploads/teachers');
        return view('admin.teachers.show', compact('teacher'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }


    public function edit(Teacher $teacher)
    {
        $cathedras = Cathedra::all();
        return view('admin.teachers.form', compact('teacher', 'cathedras'));
    }


    public function update(TeachersRequest $request, Teacher $teacher)
    {
        $data = $request->validated();
        $this->save($data, $teacher, 'uploads/teachers');
        return view('admin.teachers.show', compact('teacher'))->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Teacher $teacher)
    {
        //$this->deleteFile($teacher->image);
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('alert', 'Дія виконана успішно!');
    }

}
