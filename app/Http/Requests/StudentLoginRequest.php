<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lrn' => [
                'required',
                'string',
                'digits:12',
            ],

            'password' => [
                'required',
                'string',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'lrn.required' => 'The LRN is required.',
            'lrn.digits' => 'The LRN must contain exactly 12 digits.',
            'password.required' => 'The password is required.',
        ];
    }
}
