<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display all students.
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Students retrieved successfully.',
            'data' => Student::with('studentDetails')->get(),
        ]);
    }

    /**
     * Register a student.
     */
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();

        $student = Student::create([
            'lrn' => $validated['lrn'],
            'password_hash' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Student registered successfully.',
            'data' => $student,
        ], 201);
    }

    /**
     * Display a specific student.
     */
    public function show(Student $student)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Student retrieved successfully.',
            'data' => $student,
        ]);
    }

    /**
     * Update student information.
     */
    public function update(
        StudentRequest $request,
        Student $student
    ) {
        $validated = $request->validated();

        $studentData = [];

        if (isset($validated['lrn'])) {
            $studentData['lrn'] = $validated['lrn'];
        }

        if (isset($validated['password'])) {
            $studentData['password_hash'] = Hash::make(
                $validated['password']
            );
        }

        $student->update($studentData);

        return response()->json([
            'status' => 'success',
            'message' => 'Student updated successfully.',
            'data' => $student->fresh(),
        ]);
    }

    /**
     * Delete a student.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Student deleted successfully.',
        ]);
    }
}
