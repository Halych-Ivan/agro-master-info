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
        $specialties = Specialty::orderBy('code', 'asc')->get();
        return view('admin.specialties.index', compact('specialties'));
    }


    public function create(Specialty $specialty)
    {
        return view('admin.specialties.form', compact('specialty'));
    }


    public function store(SpecialtiesRequest $request, Specialty $specialty)
    {
        $data = $request->validated();
        $this->save($data, $specialty, 'uploads/specialties');
        return view('admin.specialties.show', compact('specialty'))->with('alert', 'Дія виконана успішно!');
    }


    public function show(Specialty $specialty)
    {
        return view('admin.specialties.show', compact('specialty'));
    }


    public function edit(Specialty $specialty)
    {
        return view('admin.specialties.form', compact('specialty'));
    }


    public function update(SpecialtiesRequest $request, Specialty $specialty)
    {
        $data = $request->validated();
        $this->save($data, $specialty, 'uploads/specialties');
        return redirect()->route('admin.specialties.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return redirect()->route('admin.specialties.index')->with('alert', 'Дія виконана успішно!');
    }

//    protected function save($request, $model, $folder)
//    {
////        $model->title = $request['title'] ?? $model->title;
//        $model->code = $request['code'] ?? $model->code;
//        $model->info = $request['info'] ?? $model->info;
//
//        if(isset($request['image'])){
//            $model->image = $folder.'/'.$this->saveFile($request['image'], $folder, $model->image);
//        }
//        if(isset($request['file'])){
//            $model->file = $folder.'/'.$this->saveFile($request['file'], $folder, $model->file);
//        }
//
//        $model->save();
//    }
}
