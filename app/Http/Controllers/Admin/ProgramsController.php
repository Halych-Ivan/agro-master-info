<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
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


    public function create()
    {
        $specialties = Specialty::query()->select('id', 'title')->get();
        $levels = Level::query()->select('id', 'title')->get();
        return view('admin.programs.create', compact('specialties', 'levels'));
    }


    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $program = new Program();
        $this->save($data, $program, 'programs');
        return view('admin.programs.show', compact('program'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }


    public function edit(Program $program)
    {
        $specialties = Specialty::all();
        $levels = Level::all();
        return view('admin.programs.edit', compact('program', 'specialties', 'levels'));
    }


    public function update(AdminRequest $request, Program $program)
    {
        $data = $request->validated();
        $this->save($data, $program, 'programs');
        return redirect()->route('admin.programs.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Program $program)
    {
        return redirect()->route('admin.programs.index')->with('danger', 'Функція видалення не реалізована!!!');
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
            $file = $request['image'];
            $name = $request['year'].'-'.$request['level_id'].'-'.$request['specialty_id'].'-image.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/'.$folder, $name);
            $model->image = Storage::url($path);
        }

        if(isset($request['file'])){
            $file = $request['file'];
            $name = $request['year'].'-'.$request['level_id'].'-'.$request['specialty_id'].'-file.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/'.$folder, $name);
            $model->image = Storage::url($path);
        }

        $model->save();
    }
}
