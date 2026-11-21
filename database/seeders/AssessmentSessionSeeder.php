<?php

namespace Database\Seeders;

use App\Models\AssessmentSession;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Student::firstOrFail();

        AssessmentSession::firstOrCreate(
            [
                'student_id' => $student->id,
                'status' => 'completed',
            ],
            [
                'started_at' => now()->subHour(),
                'completed_at' => now(),
            ]
        );
        //
    }
}
