<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
        return [
            'lrn' => [
                'required',
                'string',
                'digits:12',
                'unique:students,lrn',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:student_details,email',
            ],
            'age' => ['required', 'integer', 'min:0'],
            'gender' => ['required', 'string', 'max:50'],
            'address_id' => ['required', 'exists:addresses,id'],
            'birthdate' => ['required', 'date', 'before_or_equal:today'],
            'contact_number' => ['required', 'string', 'max:20'],
            'parent_guardian_name' => ['required', 'string', 'max:255'],
            'guardian_contact_number' => ['required', 'string', 'max:20'],
        ];
    }


    public function messages(): array
    {
        return [
            'lrn.required' => 'The LRN is required.',
            'lrn.digits' => 'The LRN must contain exactly 12 digits.',
            'lrn.unique' => 'This LRN is already registered.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
