<?php

namespace App\Http\Requests\Order\Modeling;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdminRequest extends FormRequest
{
    public function authorize() :bool
    {
        return true;
    }

    public function rules() :array
    {
        return [
            'language_id'=>['required'],
            'name'=>['required', 'string', 'max:20'],
            'email'=>['required', 'string', 'email', 'max:20'],
            'link'=>['required', 'url'],
            'texturing'=>['required', 'numeric']
        ];
    }
}
