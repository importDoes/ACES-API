<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentDetailRequest;
use App\Models\StudentDetail;
use Illuminate\Support\Facades\DB;

class StudentDetailController extends Controller
{
    /**
     * Display all student details.
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Student details retrieved successfully.',
            'data' => StudentDetail::with([
                'user',
                'role',
                'address'
            ])->paginate(10),
        ]);
    }

    /**
     * Store student details.
     */
    public function store(StudentDetailRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $studentDetail = StudentDetail::create($validated);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Student details registration successful.',
                'data' => $studentDetail->load([
                    'user',
                    'role',
                    'address'
                ]),
            ], 201);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Student details registration failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display a specific student detail.
     */
    public function show(StudentDetail $studentDetail)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Student details retrieved successfully.',
            'data' => $studentDetail->load([
                'user',
                'role',
                'address'
            ]),
        ]);
    }

    /**
     * Update student details.
     */
    public function update(
        StudentDetailRequest $request,
        StudentDetail $studentDetail
    ) {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $studentDetail->update($validated);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Student details updated successfully.',
                'data' => $studentDetail->fresh()->load([
                    'user',
                    'role',
                    'address'
                ]),
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Student details update failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete student details.
     */
    public function destroy(StudentDetail $studentDetail)
    {
        try {
            DB::beginTransaction();

            $studentDetail->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Student details deleted successfully.',
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Student details deletion failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
