<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected function saveFile($file, $folder, $fileDelete = false)
    {
        if($fileDelete){ $this->deleteFile($fileDelete); }
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);
        return $filename;
    }

    protected function deleteFile($file)
    {
        $fileForDelete = public_path($file);
        if (File::exists($fileForDelete)) { File::delete($fileForDelete); }
    }


    protected function save($request, $model, $folder)
    {
        if(isset($request['title'])){ $model->title = $request['title']; }
        if(isset($request['name'])){ $model->name = $request['name']; }
        if(isset($request['code'])){ $model->code = $request['code']; }
        if(isset($request['year'])){ $model->year = $request['year']; }
        if(isset($request['info'])){ $model->info = $request['info']; }
        if(isset($request['link'])){ $model->link = $request['link']; }
        if(isset($request['abbr'])){ $model->abbr = $request['abbr']; }
        if(isset($request['term'])){ $model->term = $request['term']; }
        if(isset($request['entry'])){ $model->entry = $request['entry']; }
        if(isset($request['content'])){ $model->content = $request['content']; }
        if(isset($request['semester'])){ $model->semester = $request['semester']; }
        if(isset($request['control'])){ $model->control = $request['control']; }
        if(isset($request['size'])){ $model->size = $request['size']; }
        if(isset($request['lecture'])){ $model->lecture = $request['lecture']; }
        if(isset($request['practical'])){ $model->practical = $request['practical']; }
        if(isset($request['laboratory'])){ $model->laboratory = $request['laboratory']; }
        if(isset($request['description'])){ $model->description = $request['description']; }
        if(isset($request['teacher'])){ $model->teacher = $request['teacher']; }
        if(isset($request['is_main'])){ $model->is_main = $request['is_main']; }
        if(isset($request['is_active'])){ $model->is_active = $request['is_active']; }


        if(isset($request['level_id'])){ $model->level_id = $request['level_id']; }
        if(isset($request['program_id'])){ $model->program_id = $request['program_id']; }
        if(isset($request['specialty_id'])){ $model->specialty_id = $request['specialty_id']; }
        if(isset($request['cathedra_id'])){ $model->cathedra_id = $request['cathedra_id']; }


        if(isset($request['plan_full'])){$model->plan_full = $folder.'/'.$this->saveFile($request['plan_full'], $folder, $model->plan_full);}
        if(isset($request['plan_extra'])){$model->plan_extra = $folder.'/'.$this->saveFile($request['plan_extra'], $folder, $model->plan_extra);}
        if(isset($request['plan_dual'])){$model->plan_dual = $folder.'/'.$this->saveFile($request['plan_dual'], $folder, $model->plan_dual);}


        if(isset($request['image'])){$model->image = $folder.'/'.$this->saveFile($request['image'], $folder, $model->image);}
        if(isset($request['logo'])){$model->logo = $folder.'/'.$this->saveFile($request['logo'], $folder, $model->logo);}
        if(isset($request['file'])) {$model->file = $folder . '/' . $this->saveFile($request['file'], $folder, $model->file);}
        if(isset($request['syllabus'])) {$model->syllabus = $folder . '/' . $this->saveFile($request['syllabus'], $folder, $model->syllabus);}
        if(isset($request['program'])) {$model->program = $folder . '/' . $this->saveFile($request['program'], $folder, $model->program);}

        $model->save();
    }
}
