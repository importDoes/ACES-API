<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'lrn' => '123456789012',
                'password_hash' => Hash::make('password123'),
            ],
            [
                'lrn' => '123456789013',
                'password_hash' => Hash::make('password123'),
            ],
            [
                'lrn' => '123456789014',
                'password_hash' => Hash::make('password123'),
            ],
        ];

        foreach ($students as $student) {
            Student::updateOrCreate(
                ['lrn' => $student['lrn']],
                $student
            );
        }
    }
}
