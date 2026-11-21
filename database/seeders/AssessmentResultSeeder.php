<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentResult;
use App\Models\AssessmentSession;
use App\Models\CareerPathway;

class AssessmentResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = AssessmentSession::firstOrFail();
        $pathway = CareerPathway::firstOrFail();

        AssessmentResult::updateOrCreate(
            [
                'assessment_session_id' => $session->assessment_session_id,
            ],
            [
                'highest_compatibility_score' => 90.00,
                'career_pathway_id' => $pathway->career_pathway_id,
                'generated_at' => now(),
            ]
        );
        //
    }
}
