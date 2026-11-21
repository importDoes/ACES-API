<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentDimension;
use App\Models\AssessmentQuestion;
use App\Models\Indicator;

class AssessmentQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'dimension' => 'Interests',
                'indicator_code' => 1001,
                'question_text' => 'Do you enjoy working with computers and technology?',
                'response_type' => 'multiple_choice',
                'is_required' => true,
                'sequence_number' => 1,
                'is_active' => true,
            ],
            [
                'dimension' => 'Skills',
                'indicator_code' => 1002,
                'question_text' => 'How confident are you in solving problems?',
                'response_type' => 'multiple_choice',
                'is_required' => true,
                'sequence_number' => 2,
                'is_active' => true,
            ],
            [
                'dimension' => 'Academic Performance',
                'indicator_code' => 1003,
                'question_text' => 'How would you rate your mathematical ability?',
                'response_type' => 'multiple_choice',
                'is_required' => true,
                'sequence_number' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($questions as $item) {
            $dimension = AssessmentDimension::where(
                'dimension_name',
                $item['dimension']
            )->firstOrFail();

            $indicator = Indicator::where(
                'indicator_code',
                $item['indicator_code']
            )->firstOrFail();

            AssessmentQuestion::updateOrCreate(
                ['sequence_number' => $item['sequence_number']],
                [
                    'assessment_dimension_id' => $dimension->assesment_dimension_id,
                    'indicator_id' => $indicator->indicator_id,
                    'question_text' => $item['question_text'],
                    'response_type' => $item['response_type'],
                    'is_required' => $item['is_required'],
                    'is_active' => $item['is_active'],
                ]
            );
        }
        //
    }
}
