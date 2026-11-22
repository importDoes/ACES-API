<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePathwayRecommendationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $recommendation = $this->route('pathwayRecommendation');

        $id = $recommendation instanceof \App\Models\PathwayRecommendation
            ? $recommendation->pathway_recommendation_id
            : $recommendation;

        return [
            'assessment_session_id' => [
                'sometimes',
                'required',
                'exists:assessment_sessions,assessment_session_id',
                Rule::unique('pathway_recommendations', 'assessment_session_id')
                    ->ignore($id, 'pathway_recommendation_id'),
            ],
            'career_pathway_id' => 'sometimes|required|exists:career_pathways,career_pathway_id',
            'interest_alignment_score' => 'sometimes|required|numeric|min:0',
            'skills_alignment_score' => 'sometimes|required|numeric|min:0',
            'academic_alignment_score' => 'sometimes|required|numeric|min:0',
            'compatibility_score' => 'sometimes|required|numeric|min:0',
            'recommendation_rank' => 'sometimes|required|integer|min:1',
            'is_primary' => 'sometimes|required|boolean',
        ];
    }
}

            //
        