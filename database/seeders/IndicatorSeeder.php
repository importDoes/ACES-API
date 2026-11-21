<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssessmentDimension;
use App\Models\Indicator;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $indicators = [
            [
                'dimension' => 'Interests',
                'indicator_code' => 1001,
                'indicator_name' => 'Technology Interest',
                'indicator_type' => 'Interest',
                'description' => 'Interest in technology and computers.',
            ],
            [
                'dimension' => 'Skills',
                'indicator_code' => 1002,
                'indicator_name' => 'Problem Solving',
                'indicator_type' => 'Skill',
                'description' => 'Ability to solve problems.',
            ],
            [
                'dimension' => 'Academic Performance',
                'indicator_code' => 1003,
                'indicator_name' => 'Mathematical Ability',
                'indicator_type' => 'Academic',
                'description' => 'Ability in mathematics.',
            ],
        ];

        foreach ($indicators as $item) {
            $dimension = AssessmentDimension::where(
                'dimension_name',
                $item['dimension']
            )->firstOrFail();

            Indicator::updateOrCreate(
                ['indicator_code' => $item['indicator_code']],
                [
                    'assessment_dimension_id' => $dimension->assesment_dimension_id,
                    'indicator_name' => $item['indicator_name'],
                    'indicator_type' => $item['indicator_type'],
                    'description' => $item['description'],
                ]
            );
        //
    }
    }
}