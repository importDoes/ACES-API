<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        $isCreating = $this->isMethod('POST');

        return [
            'address_number' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'street' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'barangay' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'district' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'municipality' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'city' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'province' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'zip_code' => [
                $isCreating ? 'required' : 'sometimes',
                'required',
                'string',
                'max:10',
            ],
        ];
    }
}
