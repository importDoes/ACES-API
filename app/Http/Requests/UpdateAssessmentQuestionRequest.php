<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_dimension_id' => 'sometimes|required|exists:assessment_dimensions,assesment_dimension_id',
            'indicator_id' => 'sometimes|required|exists:indicators,indicator_id',
            'question_text' => 'sometimes|required|string',
            'response_type' => 'sometimes|required|string|max:255',
            'is_required' => 'sometimes|required|boolean',
            'sequence_number' => 'sometimes|required|integer|min:1',
            'is_active' => 'sometimes|required|boolean',
        ];
    }
}
