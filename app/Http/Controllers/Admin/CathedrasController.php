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
        $cathedras = Cathedra::query()
            ->orderBy('title', 'asc')
            ->get(['id', 'title', 'abbr', 'logo']);
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


    public function show($id)
    {
        $cathedra = Cathedra::with(['teachers' => function ($query) {
            $query->orderBy('name', 'asc');
        }])
            ->find($id);
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
}
