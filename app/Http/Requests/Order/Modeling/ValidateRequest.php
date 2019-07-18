<?php

namespace App\Http\Requests\Order\Modeling;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    public function authorize() :bool
    {
        return true;
    }

    public function rules() :array
    {
        return [
            'cLang'=>['required', 'string', 'min:2', 'max:2'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255'],
            'link'=>['required', 'url'],
            'checkbox'=>['required', 'boolean']
        ];
    }
}
