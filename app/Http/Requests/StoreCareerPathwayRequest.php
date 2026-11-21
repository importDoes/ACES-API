<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerPathwayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pathway_code' => 'required|string|max:255|unique:career_pathways,pathway_code',
            'pathway_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ];
    }
}

