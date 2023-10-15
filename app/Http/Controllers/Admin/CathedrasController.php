<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CathedrasRequest;
use App\Models\Cathedra;
use Illuminate\Http\Request;

class CathedrasController extends Controller
{
    public function index()
    {
        $cathedras = Cathedra::all();
        return view('admin.cathedras.index', compact('cathedras'));
    }


    public function create(Cathedra $cathedra)
    {
        return view('admin.cathedras.form', compact('cathedra'));
    }


    public function store(CathedrasRequest $request, Cathedra $cathedra)
    {
        $data = $request->validated();
        $this->save($data, $cathedra, 'uploads/cathedras');
        return view('admin.cathedras.show', compact('cathedra'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Cathedra $cathedra)
    {
        return view('admin.cathedras.show', compact('cathedra'));
    }


    public function edit(Cathedra $cathedra)
    {
        return view('admin.cathedras.form', compact('cathedra'));
    }


    public function update(CathedrasRequest $request, Cathedra $cathedra)
    {
        $data = $request->validated();
        $this->save($data, $cathedra, 'uploads/cathedras');
        return view('admin.cathedras.show', compact('cathedra'))->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Cathedra $cathedra)
    {
        $this->deleteFile($cathedra->logo);
        $this->deleteFile($cathedra->image);
        $cathedra->delete();
        return redirect()->route('admin.cathedras.index')->with('alert', 'Дія виконана успішно!');
    }


    private function save($request, $model, $folder)
    {
        $model->title = $request['title'] ?? $model->title;
        $model->abbr = $request['abbr'] ?? $model->abbr;
        $model->link = $request['link'] ?? $model->link;
        $model->content = $request['content'] ?? $model->content;
        $model->info = $request['info'] ?? $model->info;

        if(isset($request['image'])){
            $model->image = $folder.'/'.$this->saveFile($request['image'], $folder, $model->image);
        }

        if(isset($request['logo'])){
            $model->logo = $folder.'/'.$this->saveFile($request['logo'], $folder, $model->logo);
        }

        $model->save();
    }
}
