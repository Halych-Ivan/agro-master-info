<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LevelsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'string|max:255',
            'link' => 'nullable|string|max:255',
            'info' => 'nullable|string|max:255',
        ];
    }
}
