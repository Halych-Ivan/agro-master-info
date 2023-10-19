<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubjectsRequest;
use App\Models\Cathedra;
use App\Models\Program;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index()
    {
        $search = request('search') ?? false;

        $subjects = Subject::with('program')
            ->leftJoin('programs', 'subjects.program_id', '=', 'programs.id')
            ->orderBy('programs.year', 'desc')
            ->where('subjects.title', 'like', '%'.$search.'%')
            ->select('subjects.*')
            ->paginate(10);
        return view('admin.subjects.index', compact('subjects'));
    }


    public function create(Subject $subject)
    {
        $cathedras = Cathedra::all();
        $programs = Program::orderBy('year', 'desc')->get();
        return view('admin.subjects.form', compact('subject', 'programs', 'cathedras'));
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
        $cathedras = Cathedra::all();
        $programs = Program::orderBy('year', 'desc')->get();
        return view('admin.subjects.form', compact('subject', 'programs', 'cathedras'));
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
