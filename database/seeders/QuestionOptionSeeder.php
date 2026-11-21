<?php

namespace Database\Seeders;

use App\Models\AssessmentQuestion;
use App\Models\QuestionOption;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Student::firstOrFail();

        $options = [
            1 => [
                'Strongly Agree',
                'Agree',
                'Neutral',
                'Disagree',
                'Strongly Disagree',
            ],
            2 => [
                'Very Confident',
                'Confident',
                'Moderately Confident',
                'Not Confident',
            ],
            3 => [
                'Excellent',
                'Good',
                'Average',
                'Needs Improvement',
            ],
        ];

        foreach ($options as $sequence => $choices) {
            $question = AssessmentQuestion::where(
                'sequence_number',
                $sequence
            )->firstOrFail();

            foreach ($choices as $index => $choice) {
                QuestionOption::updateOrCreate(
                    [
                        'assessment_question_id' => $question->assessment_question_id,
                        'option_text' => $choice,
                    ],
                    [
                        'student_id' => $student->id,
                        'sequence_number' => $index + 1,
                    ]
                );
            }
        }
        //
    }
}
