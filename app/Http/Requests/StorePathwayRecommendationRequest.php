<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePathwayRecommendationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_session_id' => 'required|exists:assessment_sessions,assessment_session_id|unique:pathway_recommendations,assessment_session_id',

            'career_pathway_id' => 'required|exists:career_pathways,career_pathway_id',

            'interest_alignment_score' => 'required|numeric',

            'skills_alignment_score' => 'required|numeric',

            'academic_alignment_score' => 'required|numeric',

            'compatibility_score' => 'required|numeric',

            'recommendation_rank' => 'required|integer',

            'is_primary' => 'required|boolean',
        ];
    }
}
