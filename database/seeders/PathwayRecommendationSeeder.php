<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentSession;
use App\Models\CareerPathway;
use App\Models\PathwayRecommendation;

class PathwayRecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $session = AssessmentSession::firstOrFail();
        $pathway = CareerPathway::firstOrFail();

        PathwayRecommendation::updateOrCreate(
            [
                'assessment_session_id' => $session->assessment_session_id,
            ],
            [
                'career_pathway_id' => $pathway->career_pathway_id,
                'interest_alignment_score' => 90.00,
                'skills_alignment_score' => 85.00,
                'academic_alignment_score' => 88.00,
                'compatibility_score' => 88.00,
                'recommendation_rank' => 1,
                'is_primary' => true,
            ]
        );
        //
    }
}
