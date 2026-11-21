<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentDimension;

class AssessmentDimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions = [
            [
                'dimension_name' => 'Interests',
                'description' => 'Measures the students career interests.',
            ],
            [
                'dimension_name' => 'Skills',
                'description' => 'Measures the students skills and abilities.',
            ],
            [
                'dimension_name' => 'Academic Performance',
                'description' => 'Measures the students academic strengths.',
            ],
        ];

        foreach ($dimensions as $dimension) {
            AssessmentDimension::updateOrCreate(
                ['dimension_name' => $dimension['dimension_name']],
                $dimension
            );
        }
    }
        //
    }

