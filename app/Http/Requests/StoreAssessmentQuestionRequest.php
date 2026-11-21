<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_dimension_id' => 'required|exists:assessment_dimensions,assesment_dimension_id',
            'indicator_id' => 'required|exists:indicators,indicator_id',
            'question_text' => 'required|string',
            'response_type' => 'required|string|max:255',
            'is_required' => 'required|boolean',
            'sequence_number' => 'required|integer|min:1',
            'is_active' => 'required|boolean',
        ];
    }
}
