<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CathedrasRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'abbr' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'info' => 'nullable|string|max:255',

            'image' => 'nullable|mimes:jpg,jpeg,bmp,png,gif,webp|max:2048',
            'logo' => 'nullable|mimes:jpg,jpeg,bmp,png,gif,webp|max:2048',
        ];
    }
}
