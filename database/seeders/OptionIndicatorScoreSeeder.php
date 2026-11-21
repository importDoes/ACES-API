<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OptionIndicatorScore;
use App\Models\QuestionOption;

class OptionIndicatorScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scores = [
            'Strongly Agree' => 5,
            'Agree' => 4,
            'Neutral' => 3,
            'Disagree' => 2,
            'Strongly Disagree' => 1,
            'Very Confident' => 5,
            'Confident' => 4,
            'Moderately Confident' => 3,
            'Not Confident' => 1,
            'Excellent' => 5,
            'Good' => 4,
            'Average' => 3,
            'Needs Improvement' => 1,
        ];

        foreach ($scores as $optionText => $score) {
            $option = QuestionOption::where(
                'option_text',
                $optionText
            )->first();

            if (!$option) {
                continue;
            }

            $question = $option->assessmentQuestion;

            OptionIndicatorScore::updateOrCreate(
                [
                    'question_option_id' => $option->question_option_id,
                    'indicator_id' => $question->indicator_id,
                ],
                [
                    'score_value' => (string) $score,
                ]
            );
        }
        //
    }
}
