<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProgramsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'year' => 'required|integer|between:2015,'.date('Y'),
            'info' => 'nullable|string|max:255',

            'level_id' => 'nullable|string|max:3',
            'specialty_id' => 'nullable|string|max:3',

            'image' => 'nullable|mimes:jpg,jpeg,bmp,png,gif,webp|max:2048',
            'file'  => 'nullable|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx|max:2048',
        ];
    }
}
