<?php

namespace Database\Seeders;

use App\Models\CareerPathway;
use App\Models\Indicator;
use App\Models\PathwayIndicatorMapping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PathwayIndicatorMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mappings = [
            ['IT001', 1001, 5.00],
            ['IT001', 1002, 5.00],
            ['CS001', 1001, 5.00],
            ['CS001', 1002, 5.00],
            ['CS001', 1003, 4.00],
            ['BA001', 1003, 4.00],
        ];

        foreach ($mappings as [$pathwayCode, $indicatorCode, $score]) {
            $pathway = CareerPathway::where(
                'pathway_code',
                $pathwayCode
            )->firstOrFail();

            $indicator = Indicator::where(
                'indicator_code',
                $indicatorCode
            )->firstOrFail();

            PathwayIndicatorMapping::updateOrCreate(
                [
                    'career_pathway_id' => $pathway->career_pathway_id,
                    'indicator_id' => $indicator->indicator_id,
                ],
                [
                    'mapping_score' => $score,
                    'mapping_rationale' => 'Sample career-indicator mapping.',
                ]
            );
        }
        //
    }
}
