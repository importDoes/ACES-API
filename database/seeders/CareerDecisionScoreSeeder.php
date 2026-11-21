<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentSession;
use App\Models\CareerDecisionScore;
use App\Models\Indicator;

class CareerDecisionScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $session = AssessmentSession::firstOrFail();

        $indicators = Indicator::all();

        foreach ($indicators as $indicator) {
            CareerDecisionScore::updateOrCreate(
                [
                    'assessment_session_id' => $session->assessment_session_id,
                    'indicator_id' => $indicator->indicator_id,
                ],
                [
                    'score' => 85.00,
                    'readiness_level' => 'High',
                ]
            );
        }
        //
    }
}
