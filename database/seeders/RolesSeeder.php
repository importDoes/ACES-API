<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'slug' => 'als_shs',
                'name' => 'ALS Senior High School',
                'description' => 'ALS Senior High School Student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'als_jhs',
                'name' => 'ALS Junior High School',
                'description' => 'ALS Junior High School Student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'teacher',
                'name' => 'Teacher',
                'description' => 'Teacher Account',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'guidance',
                'name' => 'Guidance',
                'description' => 'Guidance Personnel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'principal',
                'name' => 'Principal',
                'description' => 'School Principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
