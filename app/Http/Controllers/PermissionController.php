<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Permission::all(),
            'status' => 'success',
            'message' => "Permission retrieved successfully"
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function store(PermissionRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $permission = Permission::create($validated);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $permission,
                'message' => 'Permission Registration Successful',
            ], 201);
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
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return response()->json([
            'status' => 'success',
            'data' => $permission,
            'message' => "Permission ID" . $permission->id . "retrieved successfully"
        ]);
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $validated = $request->validated();

        $permission->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $permission->fresh(),
            'message' => 'Permission updated successfully.',
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Permission deleted successfully',
        ]);
    }
}
