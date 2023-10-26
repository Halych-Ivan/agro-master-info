<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends AdminRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return array_merge(parent::rules(), [
            // Ваші специфічні правила валідації для цього конкретного запиту


            // ...
        ]);
    }
}
