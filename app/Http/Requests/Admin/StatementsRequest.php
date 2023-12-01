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

            // ...
        ]);
    }
}
