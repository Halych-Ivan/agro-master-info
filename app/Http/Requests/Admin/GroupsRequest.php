<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GroupsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'info' => 'nullable|string|max:255',
            'entry' => 'nullable|string|max:255',
            'term' => 'nullable|string|max:255',

            'program_id' => 'nullable|string|max:3',
        ];
    }
}
