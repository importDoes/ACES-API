<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentDetail;
use App\Models\Role;
use App\Models\Address;
use Illuminate\Database\Seeder;

class StudentDetailSeeder extends Seeder
{
    public function run(): void
    {
        $student = Student::firstOrFail();

        $role = Role::where('slug', 'student')->firstOrFail();

        $address = Address::firstOrFail();

        $studentDetails = [
            [
                'user_id' => $student->id,
                'role_id' => $role->id,
                'name' => 'Juan Dela Cruz',
                'email' => 'juan.delacruz@example.com',
                'age' => '18',
                'gender' => 'Male',
                'address_id' => $address->id,
                'birthdate' => '2005-05-15',
                'contact_number' => '09171234567',
                'parent_guardian_name' => 'Maria Dela Cruz',
                'guardian_contact_number' => '09181234567',
            ],
            [
                'user_id' => $student->id + 1,
                'role_id' => $role->id,
                'name' => 'Maria Santos',
                'email' => 'maria.santos@example.com',
                'age' => '16',
                'gender' => 'Female',
                'address_id' => $address->id,
                'birthdate' => '2006-08-20',
                'contact_number' => '09271234567',
                'parent_guardian_name' => 'Pedro Santos',
                'guardian_contact_number' => '09381234567',
            ],
            [
                'user_id' => $student->id + 2,
                'role_id' => $role->id,
                'name' => 'Jose Reyes',
                'email' => 'jose.reyes@example.com',
                'age' => '29',
                'gender' => 'Male',
                'address_id' => $address->id,
                'birthdate' => '2004-11-10',
                'contact_number' => '09471234567',
                'parent_guardian_name' => 'Ana Reyes',
                'guardian_contact_number' => '09581234567',
            ],
        ];

        foreach ($studentDetails as $details) {
            StudentDetail::firstOrCreate($details);
        }
    }
}
