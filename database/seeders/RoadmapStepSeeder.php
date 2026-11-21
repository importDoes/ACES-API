<?php

namespace Database\Seeders;

use App\Models\CareerIntervention;
use App\Models\RoadmapStep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoadmapStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $interventions = CareerIntervention::all();

        foreach ($interventions as $intervention) {

            RoadmapStep::updateOrCreate(
                [
                    'career_intervention_id' =>
                        $intervention->career_intervention_id,
                    'step_number' => 1,
                ],
                [
                    'step_title' => 'Identify Learning Goals',
                    'step_description' =>
                        'Identify the skills and knowledge needed to improve career readiness.',
                    'suggested_resource' => 'Online learning platforms',
                    'completion_status' => 'Pending',
                ]
            );

            RoadmapStep::updateOrCreate(
                [
                    'career_intervention_id' =>
                        $intervention->career_intervention_id,
                    'step_number' => 2,
                ],
                [
                    'step_title' => 'Complete Learning Activities',
                    'step_description' =>
                        'Participate in activities and practice tasks related to the selected career pathway.',
                    'suggested_resource' => 'Tutorials and practice exercises',
                    'completion_status' => 'Pending',
                ]
            );

            RoadmapStep::updateOrCreate(
                [
                    'career_intervention_id' =>
                        $intervention->career_intervention_id,
                    'step_number' => 3,
                ],
                [
                    'step_title' => 'Evaluate Progress',
                    'step_description' =>
                        'Review completed activities and evaluate improvements in skills and career readiness.',
                    'suggested_resource' => 'Progress assessment',
                    'completion_status' => 'Pending',
                ]
            );
        }
        //
    }
}
