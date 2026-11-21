<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentResultRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_session_id' => 'sometimes|required|exists:assessment_sessions,assessment_session_id',
            'highest_compatibility_score' => 'sometimes|required|numeric|min:0',
            'career_pathway_id' => 'sometimes|required|exists:career_pathways,career_pathway_id',
            'generated_at' => 'sometimes|required|date',
        ];
    }
}
