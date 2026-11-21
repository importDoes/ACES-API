<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerInterventionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pathway_recommendation_id' => 'sometimes|required|exists:pathway_recommendations,pathway_recommendation_id',
            'intervention_description' => 'sometimes|required|string',
            'intervention_category' => 'sometimes|required|string|max:255',
            'priority_level' => 'sometimes|required|string|max:255',
        ];
    }
}
