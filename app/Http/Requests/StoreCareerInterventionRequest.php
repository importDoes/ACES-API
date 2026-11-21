
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerInterventionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pathway_recommendation_id' => 'required|exists:pathway_recommendations,pathway_recommendation_id',
            'intervention_description' => 'required|string',
            'intervention_category' => 'required|string|max:255',
            'priority_level' => 'required|string|max:255',
        ];
    }
}
