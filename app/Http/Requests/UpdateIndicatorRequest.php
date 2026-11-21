<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIndicatorRequest extends FormRequest
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
         $indicator = $this->route('indicator');

        $id = $indicator instanceof \App\Models\Indicator
            ? $indicator->indicator_id
            : $indicator;
        return [
            'assessment_dimension_id' => 'sometimes|required|exists:assessment_dimensions,assesment_dimension_id',
            'indicator_code' => [
                'sometimes',
                'required',
                'integer',
                Rule::unique('indicators', 'indicator_code')->ignore($id, 'indicator_id'),
            ],
            'indicator_name' => 'sometimes|required|string|max:255',
            'indicator_type' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            //
        ];
    }
}
