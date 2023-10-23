<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubjectsRequest;
use App\Models\Cathedra;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    public function index()
    {
        $size = request('size') ?? 10;
        $search = request('search') ?? false;
        $cathedra = request('cathedra') ?? false;
        $program = request('program') ?? false;
        $this->filter($search, 'search');
        $this->filter($cathedra, 'cathedra');
        $this->filter($program, 'program');

        $searchSubjectTitle = session('search') ?? '';
        $searchCathedraId = session('cathedra') ?? '';
        $searchProgramId = session('program') ?? '';

        $subjects = Subject::whereHas('cathedra', function ($q) use ($searchCathedraId) {
            $q->where('id', 'like', '%' . $searchCathedraId . '%');})
            ->whereHas('program', function ($q) use ($searchProgramId) {
                $q->where('id', 'like', '%' . $searchProgramId . '%');})
            ->where('title', 'like', '%' . $searchSubjectTitle . '%')
            ->orderBy('is_active', 'desc')
            ->orderBy('program_id', 'desc')
            ->orderBy('semester', 'asc')
            ->orderBy('title', 'asc')
            ->paginate($size);

        $cathedras = Cathedra::query()->select('id', 'abbr')->orderBy('abbr', 'asc')->get();
        $programs = Program::query()->select('id', 'title', 'year')->orderBy('year', 'asc')->get();
        return view('admin.subjects.index', compact('subjects', 'cathedras', 'programs'));
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

        $currentYear = date("Y"); // отримуємо поточний рік
        $currentMonth = date("n"); // отримуємо поточний місяць (1-12)
        $course = $currentYear - $subject->program->year;
        if ($currentMonth > 8) {$course++;}

        $semester_I = $course * 2 - 1;
        $semester_II = $course * 2;
        if($data['semester'] == $semester_I || $data['semester'] == $semester_II){
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $this->save($data, $subject, 'uploads/subjects');
        return view('admin.subjects.show', compact('subject'))->with('alert', 'Дія виконана успішно!');
    }


    public function show($id)
    {
//        dd($id);
        $subject = Subject::with('teachers')->find($id);
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


        $currentYear = date("Y"); // отримуємо поточний рік
        $currentMonth = date("n"); // отримуємо поточний місяць (1-12)
        $startYear = Program::where('id', $data['program_id'])->value('year');
        $course = $currentYear - $startYear;
        if ($currentMonth > 8) {$course++;}
        $semester_I = $course * 2 - 1;
        $semester_II = $course * 2;
        if($data['semester'] == $semester_I || $data['semester'] == $semester_II){
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }


        $this->save($data, $subject, 'uploads/subjects');
        return view('admin.subjects.show', compact('subject'))->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Subject $subject)
    {
        $this->deleteFile($subject->image);
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with('alert', 'Дія виконана успішно!');
    }


    public function add_teacher($id, $teacher = null, $main = null)
    {
        try {
            $subject = Subject::findOrFail($id);

            if($teacher) {

                $teacher = Teacher::find($teacher);
//                $subject->teachers()->attach($teacher);

                if($main){
                    $subject->teachers()->syncWithoutDetaching([$teacher->id => ['is_main' => true]]);
                }else{
                    $subject->teachers()->syncWithoutDetaching([$teacher->id => ['is_main' => false]]);
                }

                return redirect()->route('admin.subjects.show', $subject->id);
            }

            $cathedras = Cathedra::query()
                ->select('id', 'title', 'abbr')
                ->orderBy('abbr', 'asc')
                ->get();

            return view('admin.subjects.add_teacher', compact('subject', 'cathedras'));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Subject not found.');
        }
    }

    public function dell_teacher($id, $teacher)
    {
        $subject = Subject::find($id);
        $teacher = Teacher::find($teacher);
        $teacher->subjects()->detach($subject);

        return redirect()->back();
    }
}
