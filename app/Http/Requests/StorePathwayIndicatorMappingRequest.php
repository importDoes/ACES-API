<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePathwayIndicatorMappingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'career_pathway_id' => 'required|exists:career_pathways,career_pathway_id',
            'indicator_id' => 'required|exists:indicators,indicator_id',
            'mapping_score' => 'required|numeric|min:0',
            'mapping_rationale' => 'nullable|string',
        ];
    }
}
