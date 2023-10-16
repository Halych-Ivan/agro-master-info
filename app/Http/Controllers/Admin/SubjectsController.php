<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubjectsRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }


    public function create(Subject $subject)
    {
        return view('admin.subjects.form', compact('subject'));
    }


    public function store(SubjectsRequest $request, Subject $subject)
    {
        $data = $request->validated();
        $this->save($data, $subject, 'uploads/subjects');
        return view('admin.subjects.show', compact('subject'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Subject $subject)
    {
        return view('admin.subjects.show', compact('subject'));
    }


    public function edit(Subject $subject)
    {
        return view('admin.subjects.form', compact('subject'));
    }


    public function update(SubjectsRequest $request, Subject $subject)
    {
        $data = $request->validated();
        $this->save($data, $subject, 'uploads/subjects');
        return view('admin.subjects.show', compact('subject'))->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Subject $subject)
    {
        $this->deleteFile($subject->image);
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with('alert', 'Дія виконана успішно!');
    }

}
