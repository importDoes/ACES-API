<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Address::all(),
            'status' => 'success',
            'message' => "Address retrieved successfully"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $address = Address::create($validated);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $address,
                'message' => 'Address Registration Successful',
            ], 201);
        } catch (\Throwable $e) {

            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }

        dd("Address Registration Successful");
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return response()->json([
            'status' => 'success',
            'data' => $address,
            'message' => "Address ID" . $address->id . "retrieved successfully"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $address->update($validated);
            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $address->fresh(),
                'message' => 'Address updated successfully.',
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
    public function destroy(Address $address)
    {
        $address->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Address deleted successfully',
        ]);
    }
}
