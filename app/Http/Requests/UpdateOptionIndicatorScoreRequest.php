
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionIndicatorScoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_option_id' => 'sometimes|required|exists:question_options,question_option_id',
            'indicator_id' => 'sometimes|required|exists:indicators,indicator_id',
            'score_value' => 'sometimes|required|string|max:255',
        ];
    }
}
