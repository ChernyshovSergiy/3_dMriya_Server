<?php

namespace App\Http\Requests\Order\Printing;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            //
        ];
    }
}
