<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecialtiesRequest;
use App\Models\Specialty;
use Illuminate\Support\Facades\Storage;

class SpecialtiesController extends Controller
{

    public function index()
    {
        $specialties = Specialty::all();
        return view('admin.specialties.index', compact('specialties'));
    }


    public function create()
    {
        return view('admin.specialties.create');
    }


    public function store(SpecialtiesRequest $request)
    {
        $data = $request->validated();
        $specialty = new Specialty();
        $this->save($data, $specialty, 'specialties');
        return view('admin.specialties.show', compact('specialty'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Specialty $specialty)
    {
        return view('admin.specialties.show', compact('specialty'));
    }


    public function edit(Specialty $specialty)
    {
        return view('admin.specialties.edit', compact('specialty'));
    }


    public function update(SpecialtiesRequest $request, Specialty $specialty)
    {
        $data = $request->validated();
        $this->save($data, $specialty, 'specialties');
        return redirect()->route('admin.specialties.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Specialty $specialty)
    {
        return redirect()->route('admin.specialties.index')->with('danger', 'Функція видалення не реалізована!!!');
    }

    private function save($request, $model, $folder)
    {
//        dd($request);
        if(isset($request['code'])){ $model->code = $request['code']; }
        if(isset($request['title'])){ $model->title = $request['title']; }
        if(isset($request['info'])){ $model->info = $request['info']; }

        if(isset($request['image'])){
            $image = $request['image'];
            $name = $request['title'].'-image.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/'.$folder, $name);
            $model->image = Storage::url($path);
        }

        if(isset($request['file'])){
            $file = $request['file'];
            $name = $request['title'].'-file.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/'.$folder, $name);
            $model->file = Storage::url($path);
        }

        $model->save();
    }
}
