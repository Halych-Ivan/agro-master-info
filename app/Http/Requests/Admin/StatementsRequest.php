<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StatementsRequest extends AdminRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return array_merge(parent::rules(), [
            // Ваши специфічні правила валідації для цього конкретного запиту
            'title' => 'nullable|string|max:255',
<<<<<<< HEAD
=======
            'group' => 'nullable|string|max:255',
            'subject_id' => 'nullable|string|max:255',
>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f

            // ...
        ]);
    }
}
