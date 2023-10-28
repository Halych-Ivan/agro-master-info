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

    protected function filter($value, $key)
    {
        if($value) {session([$key => $value]);}
        if($value == 'all') {session()->forget($key);}
    }


    protected function save($request, $model, $folder)
    {
        if(isset($request['abbr'])){ $model->abbr = $request['abbr']; }
        if(isset($request['address'])){ $model->address = $request['address']; }
        if(isset($request['address_region'])){ $model->address_region = $request['address_region']; }
        if(isset($request['address_city'])){ $model->address_city = $request['address_city']; }
        if(isset($request['address_street'])){ $model->address_street = $request['address_street']; }
        if(isset($request['birth'])){ $model->birth = $request['birth']; }

        if(isset($request['code'])){ $model->code = $request['code']; }
        if(isset($request['code_ident'])){ $model->code_ident = $request['code_ident']; }
        if(isset($request['content'])){ $model->content = $request['content']; }
        if(isset($request['contract_sum'])){ $model->contract_sum = $request['contract_sum']; }
        if(isset($request['control'])){ $model->control = $request['control']; }

        if(isset($request['description'])){ $model->description = $request['description']; }
        if(isset($request['entry'])){ $model->entry = $request['entry']; }
        if(isset($request['email'])){ $model->email = $request['email']; }
        if(isset($request['finance'])){ $model->finance = $request['finance']; }

        if(isset($request['gradebook'])){ $model->gradebook = $request['gradebook']; }
        if(isset($request['grade'])){
            if($request['grade'] === 'null') $model->grade = null;
            else $model->grade = $request['grade'];
        }

        if(isset($request['info'])){ $model->info = $request['info']; }
        if(isset($request['link'])){ $model->link = $request['link']; }
        if(isset($request['lecture'])){ $model->lecture = $request['lecture']; }
        if(isset($request['laboratory'])){ $model->laboratory = $request['laboratory']; }
        if(isset($request['mentor'])){ $model->mentor = $request['mentor']; }
        if(isset($request['name'])){ $model->name = $request['name']; }
        if(isset($request['rank'])){
            if($request['rank'] === 'null') $model->rank = null;
            else $model->rank = $request['rank'];
        }
        if(isset($request['passport_series'])){ $model->passport_series = $request['passport_series']; }
        if(isset($request['passport_number'])){ $model->passport_number = $request['passport_number']; }
        if(isset($request['passport_date_issue'])){ $model->passport_date_issue = $request['passport_date_issue']; }
        if(isset($request['passport_date_expiry'])){ $model->passport_date_expiry = $request['passport_date_expiry']; }
        if(isset($request['passport_date_authority'])){ $model->passport_date_authority = $request['passport_date_authority']; }

        if(isset($request['patronymic'])){ $model->patronymic = $request['patronymic']; }
        if(isset($request['phone'])){ $model->phone = $request['phone']; }
        if(isset($request['phone_2'])){ $model->phone_2 = $request['phone_2']; }
        if(isset($request['practical'])){ $model->practical = $request['practical']; }
        if(isset($request['position'])){ $model->position = $request['position']; }

        if(isset($request['semester'])){ $model->semester = $request['semester']; }
        if(isset($request['sex'])){ $model->sex = $request['sex']; }
        if(isset($request['student_id_number'])){ $model->student_id_number = $request['student_id_number']; }
        if(isset($request['surname'])){ $model->surname = $request['surname']; }
        if(isset($request['size'])){ $model->size = $request['size']; }
        if(isset($request['school'])){ $model->school = $request['school']; }
        if(isset($request['school_document_series'])){ $model->school_document_series = $request['school_document_series']; }
        if(isset($request['school_document_number'])){ $model->school_document_number = $request['school_document_number']; }
        if(isset($request['school_document_date'])){ $model->school_document_date = $request['school_document_date']; }

        if(isset($request['teacher'])){ $model->teacher = $request['teacher']; }
        if(isset($request['title'])){ $model->title = $request['title']; }
        if(isset($request['term'])){ $model->term = $request['term']; }
        if(isset($request['year'])){ $model->year = $request['year']; }


        if(isset($request['is_main'])){ $model->is_main = $request['is_main']; }
        if(isset($request['is_active'])){ $model->is_active = $request['is_active']; }


        if(isset($request['cathedra_id'])){ $model->cathedra_id = $request['cathedra_id']; }
        if(isset($request['group_id'])){ $model->group_id = $request['group_id']; }
        if(isset($request['level_id'])){ $model->level_id = $request['level_id']; }
        if(isset($request['program_id'])){ $model->program_id = $request['program_id']; }
        if(isset($request['specialty_id'])){ $model->specialty_id = $request['specialty_id']; }



        if(isset($request['plan_full'])){$model->plan_full = $folder.'/'.$this->saveFile($request['plan_full'], $folder, $model->plan_full);}
        if(isset($request['plan_extra'])){$model->plan_extra = $folder.'/'.$this->saveFile($request['plan_extra'], $folder, $model->plan_extra);}
        if(isset($request['plan_dual'])){$model->plan_dual = $folder.'/'.$this->saveFile($request['plan_dual'], $folder, $model->plan_dual);}


        if(isset($request['image'])){$model->image = $folder.'/'.$this->saveFile($request['image'], $folder, $model->image);}
        if(isset($request['photo'])){$model->photo = $folder.'/'.$this->saveFile($request['photo'], $folder, $model->photo);}
        if(isset($request['logo'])){$model->logo = $folder.'/'.$this->saveFile($request['logo'], $folder, $model->logo);}
        if(isset($request['file'])) {$model->file = $folder . '/' . $this->saveFile($request['file'], $folder, $model->file);}
        if(isset($request['syllabus'])) {$model->syllabus = $folder . '/' . $this->saveFile($request['syllabus'], $folder, $model->syllabus);}
        if(isset($request['program'])) {$model->program = $folder . '/' . $this->saveFile($request['program'], $folder, $model->program);}



        $model->save();
    }
}
