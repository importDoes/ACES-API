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
            ['actions' => 'create'],
            ['actions' => 'view'],
            ['actions' => 'update'],
            ['actions' => 'delete'],
            ['actions' => 'approve'],
            ['actions' => 'reject'],
            ['actions' => 'validate'],
            ['actions' => 'manage'],
        ];

        Permission::insert($permissions);
    }
}
