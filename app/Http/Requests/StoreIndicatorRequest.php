<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreIndicatorRequest extends FormRequest
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
            'assessment_dimension_id' => 'required|exists:assessment_dimensions,assesment_dimension_id',
            'indicator_code' => 'required|integer|unique:indicators,indicator_code',
            'indicator_name' => 'required|string|max:255',
            'indicator_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            //
        ];
    }
}
