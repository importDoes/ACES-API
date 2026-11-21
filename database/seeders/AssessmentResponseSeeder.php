<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentQuestion;
use App\Models\AssessmentResponse;
use App\Models\AssessmentSession;
use App\Models\QuestionOption;

class AssessmentResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = AssessmentSession::firstOrFail();

        $questions = AssessmentQuestion::all();

        foreach ($questions as $question) {
            $option = QuestionOption::where(
                'assessment_question_id',
                $question->assessment_question_id
            )->first();

            if (!$option) {
                continue;
            }

            AssessmentResponse::updateOrCreate(
                [
                    'assessment_session_id' => $session->assessment_session_id,
                    'assessment_question_id' => $question->assessment_question_id,
                ],
                [
                    'question_option_id' => $option->question_option_id,
                    'answer_text' => null,
                    'answered_at' => now(),
                ]
            );
        //
    }
}
}