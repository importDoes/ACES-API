<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Address;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RegistrationController extends Controller
{

    public function register(RegistrationRequest $request)
    {
        $validated = $request->validated();

        try {
            $student = DB::transaction(function () use ($validated) {

                // Retrieve Student Role
                $role = Role::where('slug', 'student')->firstOrFail();

                // Create Address
                $address = Address::create($validated['address']);

                // Create Student Account
                $student = Student::create([
                    'lrn' => $validated['lrn'],
                    'password_hash' => Hash::make($validated['password']),
                ]);

                // Create Student Details
                $student->studentDetails()->create([
                    'role_id' => $role->id,
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'age' => $validated['age'],
                    'gender' => $validated['gender'],
                    'address_id' => $address->id,
                    'birthdate' => $validated['birthdate'],
                    'contact_number' => $validated['contact_number'],
                    'parent_guardian_name' => $validated['parent_guardian_name'],
                    'guardian_contact_number' => $validated['guardian_contact_number'],
                    ]);

                return $student;
            });

            // Load Student Details and Address
            $student->load('studentDetails.address');
            return response()->json([
                'status' => 'success',
                'data' => $student->with('studentDetails.address'),
                'message' => 'Student registration successful.',
            ], 201);
        } catch (Throwable $e) {

            report($e);

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong during registration.',
            ], 500);
        }
    }
}
