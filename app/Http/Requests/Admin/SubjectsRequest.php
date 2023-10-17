<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubjectsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
            'abbr' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',

            'info' => 'nullable|string|max:255',
            'semester' => 'nullable|string|max:255',
            'control' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'lecture' => 'nullable|string|max:255',
            'practical' => 'nullable|string|max:255',
            'laboratory' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'teacher' => 'nullable|string|max:255',

            'is_main' => 'nullable|string|max:255',
            'is_active' => 'nullable|string|max:255',

            'program_id' => 'nullable|string|max:255',
            'cathedra_id' => 'nullable|string|max:255',

            'syllabus' => 'nullable|mimes:png,jpg,jpeg,webp,csv,txt,xlx,xls,pdf,doc,docx|max:2048',
            'program' => 'nullable|mimes:png,jpg,jpeg,webp,csv,txt,xlx,xls,pdf,doc,docx|max:2048',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp,csv,txt,xlx,xls,pdf,doc,docx|max:2048',
        ];
    }
}
