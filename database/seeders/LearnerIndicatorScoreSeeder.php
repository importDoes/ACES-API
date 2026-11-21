<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentSession;
use App\Models\Indicator;
use App\Models\LearnerIndicatorScore;

class LearnerIndicatorScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = AssessmentSession::firstOrFail();

        $indicators = Indicator::all();

        foreach ($indicators as $indicator) {
            LearnerIndicatorScore::updateOrCreate(
                [
                    'assessment_session_id' => $session->assessment_session_id,
                    'indicator_id' => $indicator->indicator_id,
                ],
                [
                    'raw_score' => 80,
                    'normalized_score' => 80,
                ]
            );
        }
        //
    }
}
