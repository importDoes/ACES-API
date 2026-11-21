<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CareerIntervention;
use App\Models\PathwayRecommendation;

class CareerInterventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recommendation = PathwayRecommendation::firstOrFail();

        CareerIntervention::updateOrCreate(
            [
                'pathway_recommendation_id' =>
                    $recommendation->pathway_recommendation_id,
                'intervention_category' => 'Skill Development',
            ],
            [
                'intervention_description' =>
                    'Improve technical knowledge and problem-solving skills through practice and additional learning activities.',
                'priority_level' => 'High',
            ]
        );

        CareerIntervention::updateOrCreate(
            [
                'pathway_recommendation_id' =>
                    $recommendation->pathway_recommendation_id,
                'intervention_category' => 'Career Exploration',
            ],
            [
                'intervention_description' =>
                    'Explore career opportunities, research different professions, and understand the qualifications needed.',
                'priority_level' => 'Medium',
            ]
        );
        //
    }
}
