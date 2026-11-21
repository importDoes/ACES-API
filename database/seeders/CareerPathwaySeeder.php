<?php

namespace Database\Seeders;

use App\Models\CareerPathway;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerPathwaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pathways = [
            [
                'pathway_code' => 'IT001',
                'pathway_name' => 'Information Technology',
                'description' => 'Careers related to computers and technology.',
                'is_active' => true,
            ],
            [
                'pathway_code' => 'CS001',
                'pathway_name' => 'Computer Science',
                'description' => 'Careers related to programming and computing.',
                'is_active' => true,
            ],
            [
                'pathway_code' => 'BA001',
                'pathway_name' => 'Business Administration',
                'description' => 'Careers related to business management.',
                'is_active' => true,
            ],
        ];

        foreach ($pathways as $pathway) {
            CareerPathway::updateOrCreate(
                ['pathway_code' => $pathway['pathway_code']],
                $pathway
            );
        }
        //
    }
}
