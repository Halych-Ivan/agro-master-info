<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected function saveFile($file, $folder, $fileDelete = false)
    {
        if($fileDelete){ $this->deleteFile($fileDelete, $folder); }

        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        return $filename;
    }


    protected function deleteFile($file, $folder)
    {
        $fileForDelete = public_path($folder . '/' . $file);
        if (File::exists($fileForDelete)) { File::delete($fileForDelete); }
    }

















    protected function saveData($request, $model, $folder = 'main')
    {
//        dd($request);
        if(isset($request['abbr'])){ $model->abbr = $request['abbr']; }
        if(isset($request['info'])){ $model->info = $request['info']; }
        if(isset($request['code'])){ $model->code = $request['code']; }
        if(isset($request['year'])){ $model->year = $request['year']; }
        if(isset($request['link'])){ $model->link = $request['link']; }
        if(isset($request['name'])){ $model->name = $request['name']; }
        if(isset($request['surname'])){ $model->surname = $request['surname']; }
        if(isset($request['patronymic'])){ $model->patronymic = $request['patronymic']; }
        if(isset($request['gradebook'])){ $model->gradebook = $request['gradebook']; }
        if(isset($request['finance'])){ $model->finance = $request['finance']; }
        if(isset($request['order'])){ $model->order = $request['order']; }
        if(isset($request['order_in'])){ $model->order_in = $request['order_in']; }
        if(isset($request['order_in_data'])){ $model->order_in_data = $request['order_in_data']; }
        if(isset($request['order_out'])){ $model->order_out = $request['order_out']; }
        if(isset($request['order_out_data'])){ $model->order_out_data = $request['order_out_data']; }
        if(isset($request['study_start'])){ $model->study_start = $request['study_start']; }
        if(isset($request['study_end'])){ $model->study_end = $request['study_end']; }
        if(isset($request['case'])){ $model->case = $request['case']; }
        if(isset($request['contract'])){ $model->contract = $request['contract']; }
        if(isset($request['contract_date'])){ $model->contract_date = $request['contract_date']; }
        if(isset($request['sex'])){ $model->sex = $request['sex']; }
        if(isset($request['birth'])){ $model->birth = $request['birth']; }
        if(isset($request['passport'])){ $model->passport = $request['passport']; }
        if(isset($request['passport_series'])){ $model->passport_series = $request['passport_series']; }
        if(isset($request['passport_number'])){ $model->passport_number = $request['passport_number']; }
        if(isset($request['passport_record'])){ $model->passport_record = $request['passport_record']; }
        if(isset($request['passport_date_issue'])){ $model->passport_date_issue = $request['passport_date_issue']; }
        if(isset($request['passport_date_expiry'])){ $model->passport_date_expiry = $request['passport_date_expiry']; }
        if(isset($request['student_id_number'])){ $model->student_id_number = $request['student_id_number']; }






        if(isset($request['meet'])){ $model->meet = $request['meet']; }
        if(isset($request['term'])){ $model->term = $request['term']; }
        if(isset($request['title'])){ $model->title = $request['title']; }
        if(isset($request['email'])){ $model->email = $request['email']; }
        if(isset($request['phone'])){ $model->phone = $request['phone']; }
        if(isset($request['entry'])){ $model->entry = $request['entry']; }
        if(isset($request['position'])){ $model->position = $request['position']; }


        if(isset($request['level_id'])){ $model->level_id = $request['level_id']; }
        if(isset($request['group_id'])){ $model->group_id = $request['group_id']; }
        if(isset($request['program_id'])){ $model->program_id = $request['program_id']; }
        if(isset($request['cathedra_id'])){ $model->cathedra_id = $request['cathedra_id']; }
        if(isset($request['specialty_id'])){ $model->specialty_id = $request['specialty_id']; }


        if(isset($request['address'])){ $model->address = $request['address']; }
        if(isset($request['address_region'])){ $model->address_region = $request['address_region']; }
        if(isset($request['address_district'])){ $model->address_district = $request['address_district']; }
        if(isset($request['address_city'])){ $model->address_city = $request['address_city']; }
        if(isset($request['address_street'])){ $model->address_street = $request['address_street']; }
        if(isset($request['school'])){ $model->school = $request['school']; }
        if(isset($request['school_document'])){ $model->school_document = $request['school_document']; }
        if(isset($request['school_document_number'])){ $model->school_document_number = $request['school_document_number']; }
        if(isset($request['school_document_date'])){ $model->school_document_date = $request['school_document_date']; }
        if(isset($request['school_document_mark'])){ $model->school_document_mark = $request['school_document_mark']; }
        if(isset($request['mentor'])){ $model->mentor = $request['mentor']; }




        if(isset($request['school_document_photo'])){
            $url = $request['school_document_photo']->storePublicly($folder.'/'.$model->id, 'public');
            $model->school_document_photo = Storage::url($url);
        }

        if(isset($request['student_id_photo'])){
            $url = $request['student_id_photo']->storePublicly($folder.'/'.$model->id, 'public');
            $model->student_id_photo = Storage::url($url);
        }

        if(isset($request['passport_photo'])){
            $url = $request['passport_photo']->storePublicly($folder.'/'.$model->id, 'public');
            $model->passport_photo = Storage::url($url);
        }

        if(isset($request['photo'])){
            $url = $request['photo']->storePublicly($folder.'/'.$model->id, 'public');
            $model->photo = Storage::url($url);
        }

        if(isset($request['logo'])){
            $url = $request['logo']->storePublicly($folder.'/'.$model->id, 'public');
            $model->logo = Storage::url($url);
        }

        if(isset($request['image'])){
//            $url = $request['image']->storePublicly($folder.'/'.$model->id, 'public');
            $url = $request['image']->storePublicly($folder.'/'.$model->id, 'public');
            $model->image = Storage::url($url);
        }

        if(isset($request['file'])){
            $url = $request['file']->storePublicly($folder.'/'.$model->id, 'public');
            $model->file = Storage::url($url);
        }

//        dd($model);
        $model->save();
    }
}
