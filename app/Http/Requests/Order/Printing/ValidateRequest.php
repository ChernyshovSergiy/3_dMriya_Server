<?php

namespace App\Http\Requests\Order\Printing;

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
            'cLang'=>                 ['required', 'string', 'size:2'],
            'name'=>                  ['required', 'string', 'max:255'],
            'email'=>                 ['required', 'string', 'email', 'max:255'],
            'link'=>                  ['required', 'url'],
            'sizeId'=>                ['required', 'integer', 'min:0', 'max:6'],
            'height'=>                ['required', 'integer', 'min:0', 'max:185'],
            'material'=>              ['required', 'integer', 'min:1', 'max:2'],
            'quality'=>               ['required', 'integer', 'min:1', 'max:3'],
            'quantity'=>              ['required', 'digits_between:1,6'],
            'checkboxHollow'=>        ['required', 'boolean'],
            'checkboxPostProcessing'=>['required', 'boolean'],
            'checkboxSupport'=>       ['required', 'boolean'],
            'country'=>               ['required', 'string', 'size:2'],
            'zipCode'=>               ['required', 'string', 'max:255'],
            'state'=>                 ['nullable', 'string', 'max:255'],
            'state_abbreviation'=>    ['nullable', 'string'],
            'city'=>                  ['required', 'string', 'max:255'],
            'latitude'=>              ['nullable', 'string', 'max:255'],
            'longitude'=>             ['nullable', 'string', 'max:255'],
            'address'=>               ['required', 'string'],
            'phone'=>                 ['required', 'integer', 'digits:10'],
        ];
    }
}
