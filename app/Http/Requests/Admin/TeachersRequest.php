<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeachersRequest extends AdminRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'title' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            // Ваши специфічні правила валідації для цього конкретного запиту


            // ...
        ]);
    }
}
