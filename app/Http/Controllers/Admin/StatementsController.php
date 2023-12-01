<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatementsRequest;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Program;
use App\Models\Statement;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StatementsController extends Controller
{

    public function index()
    {
        $statements = '';
        return view('admin.statements.index', compact('statements'));
    }


    public function create(Statement $statement)
    {
        $programs = Program::all();


        $search = request('search') ?? false;
        $program = request('program') ?? false;
        $semester = request('semester') ?? false;
        $this->filter($search, 'search');
        $this->filter($program, 'program');
        $this->filter($semester, 'semester');

        $searchSubject = session('search') ?? '';
        $searchProgramId = session('program') ?? '';
        $searchSemester = session('semester') ?? '';

        $subjects = Subject::whereHas('program', function ($q) use ($searchProgramId) {
            $q->where('id', 'like', '%' . $searchProgramId . '%');})
            ->where('semester', 'like', '%' . $searchSemester . '%')
            ->where('title', 'like', '%' . $searchSubject . '%')
            ->orderBy('is_main')
            ->orderBy('title')
            ->get();

        $groups = Group::whereHas('program', function ($q) use ($searchProgramId) {
            $q->where('id', 'like', '%' . $searchProgramId . '%');})
            ->orderBy('title')
            ->get();

        return view('admin.statements.form', compact('statement', 'programs', 'subjects' , 'groups'));
    }


    public function store(StatementsRequest $request)
    {
        $data = $request->validated();

        $statement = new Statement([
            'group_id' => $data['group_id'],
            'subject_id' => $data['subject_id'],

        ]);
        $statement->save();
        return redirect()->route('admin.statement.index');
    }


    public function show(Statement $statement)
    {
        //
    }


    public function edit(Statement $statement)
    {
        //
    }


    public function update(StatementsRequest $request, Statement $statement)
    {
        //
    }


    public function destroy(Statement $statement)
    {
        //
    }
}
