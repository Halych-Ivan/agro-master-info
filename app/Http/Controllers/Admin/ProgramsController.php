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
//        dd($programs);
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
        $this->save($data, $program, 'uploads/programs');
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
        $this->save($data, $program, 'uploads/programs');
        return redirect()->route('admin.programs.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('alert', 'Дія виконана успішно!');
    }

}
