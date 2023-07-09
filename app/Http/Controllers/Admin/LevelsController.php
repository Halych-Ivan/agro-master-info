<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Level;

class LevelsController extends Controller
{

    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }


    public function create()
    {
        return view('admin.levels.create');
    }


    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $level = new Level();
        $this->saveData($data, $level, 'levels'); // protected in Controller
        return view('admin.levels.show', compact('level'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }


    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }


    public function update(AdminRequest $request, Level $level)
    {
        $data = $request->validated();
        $this->saveData($data, $level, 'levels'); // protected in Controller
        return redirect()->route('admin.levels.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Level $level)
    {
       return redirect()->route('admin.levels.index')->with('danger', 'Функція видалення не реалізована!!!');
    }
}
