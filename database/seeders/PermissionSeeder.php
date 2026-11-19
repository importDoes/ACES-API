<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'action' => 'manage_students',
                'description' => 'Create, view, update, and delete student records.',
            ],
            [
                'action' => 'view_students',
                'description' => 'View student records.',
            ],
            [
                'action' => 'manage_assessments',
                'description' => 'Manage career assessments and questions.',
            ],
            [
                'action' => 'take_assessments',
                'description' => 'Answer and submit career assessments.',
            ],
            [
                'action' => 'view_recommendations',
                'description' => 'View career pathway recommendations.',
            ],
            [
                'action' => 'manage_career_pathways',
                'description' => 'Manage available career pathways.',
            ],
            [
                'action' => 'manage_roadmaps',
                'description' => 'Create and manage career development roadmaps.',
            ],
            [
                'action' => 'view_reports',
                'description' => 'View assessment and recommendation reports.',
            ],
            [
                'action' => 'manage_roles',
                'description' => 'Create, update, and delete system roles.',
            ],
            [
                'action' => 'manage_permissions',
                'description' => 'Manage system permissions.',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['action' => $permission['action']],
                ['description' => $permission['description']]
            );
        }
    }
}
