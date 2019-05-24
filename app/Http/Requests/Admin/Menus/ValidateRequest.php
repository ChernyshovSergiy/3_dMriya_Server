<?php

namespace App\Http\Requests\Admin\Menus;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'is_active' => 'nullable',
            'section' => 'required',
            'title:en' => 'required',
            'url' => 'required',
            'parent' => 'required',
            'sort' => 'required'
        ];
    }
}
