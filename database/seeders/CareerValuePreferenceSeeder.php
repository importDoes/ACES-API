<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentSession;
use App\Models\CareerValuePreference;
use App\Models\Indicator;

class CareerValuePreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = AssessmentSession::firstOrFail();

        $indicators = Indicator::all();

        foreach ($indicators as $indicator) {
            CareerValuePreference::updateOrCreate(
                [
                    'assessment_session_id' => $session->assessment_session_id,
                    'indicator_id' => $indicator->indicator_id,
                ],
                [
                    'importance_level' => 'High',
                    'score' => 90.00,
                ]
            );
        }
        //
    }
}
