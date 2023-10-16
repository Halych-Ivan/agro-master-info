<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LevelsRequest;
use App\Models\Level;

class LevelsController extends Controller
{

    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }


    public function create(Level $level)
    {
        return view('admin.levels.form', compact('level'));
    }


    public function store(LevelsRequest $request, Level $level)
    {
        $data = $request->validated();
        $this->save($data, $level, 'levels');
        return view('admin.levels.show', compact('level'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }


    public function edit(Level $level)
    {
        return view('admin.levels.form', compact('level'));
    }


    public function update(LevelsRequest $request, Level $level)
    {
        $data = $request->validated();
        $this->save($data, $level, 'levels');
        return redirect()->route('admin.levels.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('admin.levels.index')->with('alert', 'Дія виконана успішно!');
    }


    private function save($request, $model, $folder)
    {
        $model->title = $request['title'] ?? $model->title;
        $model->link = $request['link'] ?? $model->link;
        $model->info = $request['info'] ?? $model->info;

        $model->save();
    }
}
