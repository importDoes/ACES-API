<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'slug' => 'super-admin',
                'name' => 'Super Administrator',
                'description' => 'Has full access to all system features and configurations.',
            ],
            [
                'slug' => 'admin',
                'name' => 'Administrator',
                'description' => 'Manages student records, accounts, and system operations.',
            ],
            [
                'slug' => 'guidance-personnel',
                'name' => 'Guidance Personnel',
                'description' => 'Manages career assessments and monitors student recommendations.',
            ],
            [
                'slug' => 'student',
                'name' => 'Student',
                'description' => 'Takes career assessments and views personal career recommendations.',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['slug' => $role['slug']],
                [
                    'name' => $role['name'],
                    'description' => $role['description'],
                ]
            );
        }
    }
}
