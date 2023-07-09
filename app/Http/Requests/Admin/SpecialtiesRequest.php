<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtiesRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'code' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'info' => 'nullable|string|max:255',

            'image' => 'nullable|mimes:jpg,jpeg,bmp,png,gif,webp|max:2048',
            'file'  => 'nullable|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docx|max:2048',
        ];
    }
}
