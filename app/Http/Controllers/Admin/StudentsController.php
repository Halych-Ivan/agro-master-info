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
        $subjects = $student->subjects()->orderBy('subject_id', 'desc')
            ->get();

//        dd($subjects)








//        $subjects = $student->group->program->subjects
//            ->sortBy('semester')
//            ->sortByDesc('is_main')
//            ->sortByDesc('control')
//            ->whereIn('is_main', [1, 2])
//            ->groupBy('semester');


        $selected_subjects = $student->group->program->subjects
            ->sortBy('semester')
            ->whereIn('is_main', [1]);

        $selective_subjects = $student->group->program->subjects
            ->sortBy('semester')
            ->whereIn('is_main', [0]);








//        $subjects = $student->group->program->subjects
//            ->sortBy('code')
//            ->sortByDesc('is_main')
//            ->sortByDesc('control')
//            ->sortBy('semester');
//
//        $subjects_1 = $student->group->program->subjects->where('is_main', 1)->sortBy('semester')->load('selectedSubject');
//        $subjects_2 = $student->group->program->subjects->where('is_main', 0);
//
//
//        $subjects_3 = $student->group->program->subjects
//            ->where('is_main', 2)
//            ->sortBy('semester')
//            ->sortByDesc('control')
//            ;


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

        $student = Student::find($id);
        $student->subjects()->syncWithoutDetaching([$sub =>['instead' => $sel]]);


        $subjects = $student->group->program->subjects->whereIn('is_main', [2]);

        foreach($subjects as $subject){
            $student->subjects()->syncWithoutDetaching([$subject->id]);
        }




        return redirect()->back();
    }




}
