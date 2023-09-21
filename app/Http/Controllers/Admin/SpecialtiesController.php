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
        $specialties = Specialty::orderBy('code', 'asc')->get();;
        return view('admin.specialties.index', compact('specialties'));
    }


    public function create(Specialty $specialty)
    {
        return view('admin.specialties.form', compact('specialty'));
    }


    public function store(SpecialtiesRequest $request, Specialty $specialty)
    {
        $data = $request->validated();
        $this->save($data, $specialty, 'specialties');
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
        $this->save($data, $specialty, 'specialties');
        return redirect()->route('admin.specialties.index')->with('alert', 'Дія виконана успішно!');
    }


    public function destroy(Specialty $specialty)
    {
        $this->deleteFile($program->image, 'images/specialties');
        $this->deleteFile($program->file, 'uploads/specialties');
        $specialty->delete();
        return redirect()->route('admin.specialties.index')->with('alert', 'Дія виконана успішно!');
    }


    private function save($request, $model, $folder)
    {
        if(isset($request['code'])){ $model->code = $request['code']; }
        if(isset($request['title'])){ $model->title = $request['title']; }
        if(isset($request['info'])){ $model->info = $request['info']; }

        if(isset($request['image'])){ $model->image = $this->saveFile($request['image'], 'images/'.$folder, $model->image); }
        if(isset($request['file'])){ $model->file = $this->saveFile($request['file'], 'uploads/'.$folder); }

        $model->save();
    }
}
