<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $details = $this->route('student_detail');

        return [
            'user_id' => [
                'sometimes',
                'required',
                'exists:students,id',
                Rule::unique('student_details', 'user_id')
                    ->ignore($details),
            ],

            'role_id' => [
                'sometimes',
                'required',
                'exists:roles,id',
            ],

            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'sometimes',
                'required',
                'email',
                'max:255',
                Rule::unique('student_details', 'email')
                    ->ignore($details),
            ],

            'gender' => [
                'sometimes',
                'required',
                'string',
                'max:50',
            ],

            'address_id' => [
                'sometimes',
                'required',
                'exists:addresses,id',
            ],

            'birthdate' => [
                'sometimes',
                'required',
                'date',
                'before_or_equal:today',
            ],

            'contact_number' => [
                'sometimes',
                'required',
                'string',
                'max:20',
            ],

            'parent_guardian_name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'guardian_contact_number' => [
                'sometimes',
                'required',
                'string',
                'max:20',
            ],
        ];
    }
}
