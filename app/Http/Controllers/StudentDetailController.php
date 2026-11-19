<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentDetailRequest;
use App\Models\Role;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Throwable;

class StudentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => StudentDetail::all(),
            'status' => 'success',
            'message' => "Student details retrieved successfully"
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(StudentDetail $studentDetail)
    {
        return response()->json([
            'status' => 'success',
            'data' => $studentDetail,
            'message' => "Student Detail ID" . $studentDetail->id . "retrieved successfully"
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StudentDetailRequest $request, StudentDetail $studentDetail)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $studentDetail->update($validated);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $studentDetail->fresh(),
                'message' => 'Student Detail updated successfully.',
            ], 200);
        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentDetail $studentDetail)
    {
        $studentDetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Permission deleted successfully',
        ]);
    }
}
