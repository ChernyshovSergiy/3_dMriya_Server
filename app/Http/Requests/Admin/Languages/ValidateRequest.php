<?php

namespace App\Http\Requests\Admin\Languages;

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
            'flag_country' => 'max:2|min:2',
            'code' => 'max:2|min:2',
            'iso' => 'required',
            'file' => 'required',
            'name' => 'required'
        ];
    }
}
