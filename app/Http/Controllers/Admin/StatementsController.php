<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StatementsRequest;
use App\Models\Group;
use App\Models\Program;
use App\Models\Statement;
use App\Models\Subject;
use Illuminate\Http\Request;

class StatementsController extends Controller
{

    public function index()
    {
        $statements = Statement::all();
        return view('admin.statements.index', compact('statements'));
    }


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
    }


    public function store(StatementsRequest $request)
    {
        $data = $request->validated();

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
