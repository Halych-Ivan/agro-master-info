<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatementsRequest;
<<<<<<< HEAD
use App\Models\Grade;
use App\Models\Group;
use App\Models\Program;
use App\Models\Statement;
use App\Models\Student;
=======
use App\Models\Group;
use App\Models\Program;
use App\Models\Statement;
>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f
use App\Models\Subject;
use Illuminate\Http\Request;

class StatementsController extends Controller
{

    public function index()
    {
<<<<<<< HEAD
        $statements = '';
=======
        $statements = Statement::all();
>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f
        return view('admin.statements.index', compact('statements'));
    }


<<<<<<< HEAD
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
=======
    public function create(StatementsRequest $request, Statement $statement)
    {
        $group = false;
        $groupID = $request->input('group') ?? session('groupID') ?? '';
        if($groupID) {
            session(['groupID' => $groupID]);
            $group = Group::find($groupID);
        }

        if($request->input('semester')){
            $semester = $request->input('semester');
            session(['semester' => $semester]);
        } else {
            $semester = session('semester') ?? '';
        }

        $programs = Program::all();

        return view('admin.statements.form', compact('statement', 'programs', 'group', 'semester'));
>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f
    }


    public function store(StatementsRequest $request)
    {
        $data = $request->validated();

<<<<<<< HEAD
        $statement = new Statement([
            'group_id' => $data['group_id'],
            'subject_id' => $data['subject_id'],

        ]);
        $statement->save();
        return redirect()->route('admin.statement.index');
=======
        $groupID = $data['group_id'];
        $subjectID = $data['subject_id'];


        $group = Group::find($groupID);
        $subject = Subject::find($subjectID);
        if($subject->is_main){
            $students = $group->students()->select('students.id', 'students.surname', 'students.name', 'students.patronymic', 'students.gradebook')->get();
        } else{
            $students = $subject->students()->select('students.id', 'students.surname', 'students.name', 'students.patronymic', 'students.gradebook')->get();
        }


        $statement = new Statement();
        $statement->subject = $subject->title;
        $statement->students = $students;
//        $statement->save();





        return view('admin.statements.preload', compact('statement'));
>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f
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
