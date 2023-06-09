<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramsRequest;
use App\Models\Level;
use App\Models\Program;
use App\Models\Specialty;
use Illuminate\Support\Facades\Storage;

class ProgramsController extends Controller
{

    public function index()
    {
        $programs = Program::orderBy('year', 'asc')->get();
        return view('admin.programs.index', compact('programs'));
    }


    public function create(Program $program)
    {
        $specialties = Specialty::query()->select('id', 'title')->orderBy('code', 'asc')->get();
        $levels = Level::query()->select('id', 'title')->get();
        return view('admin.programs.form', compact('program','specialties', 'levels'));
    }


    public function store(ProgramsRequest $request, Program $program)
    {
        $data = $request->validated();
        $this->save($data, $program, 'programs');
        return view('admin.programs.show', compact('program'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }


    public function edit(Program $program)
    {
        $specialties = Specialty::query()->select('id', 'title')->orderBy('code', 'asc')->get();
        $levels = Level::query()->select('id', 'title')->get();
        return view('admin.programs.form', compact('program', 'specialties', 'levels'));
    }


    public function update(ProgramsRequest $request, Program $program)
    {
        $data = $request->validated();
        $this->save($data, $program, 'programs');
        return redirect()->route('admin.programs.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('alert', 'Дія виконана успішно!');
    }


    private function save($request, $model, $folder)
    {
//        dd($request);
        if(isset($request['title'])){ $model->title = $request['title']; }
        if(isset($request['year'])){ $model->year = $request['year']; }
        if(isset($request['info'])){ $model->info = $request['info']; }

        if(isset($request['level_id'])){ $model->level_id = $request['level_id']; }
        if(isset($request['specialty_id'])){ $model->specialty_id = $request['specialty_id']; }

        if(isset($request['image'])){
            $image = $request['image'];
            $path = $image->store('public/'.$folder);
            $model->image = Storage::url($path);
        }

        if(isset($request['file'])){
            $file = $request['file'];
            $path = $file->store('public/'.$folder);
            $model->file = Storage::url($path);
        }

        $model->save();
    }
}
