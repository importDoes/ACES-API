<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display all addresses.
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Addresses retrieved successfully.',
            'data' => Address::with('studentDetails')->paginate(10),
        ]);
    }

    /**
     * Store a new address.
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
                'message' => 'Address registration successful.',
                'data' => $address,
            ], 201);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Address registration failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display a specific address.
     */
    public function show(Address $address)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Address retrieved successfully.',
            'data' => $address->load('studentDetails'),
        ]);
    }

    /**
     * Update an address.
     */
    public function update(
        AddressRequest $request,
        Address $address
    ) {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $address->update($validated);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Address updated successfully.',
                'data' => $address->fresh(),
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Address update failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Delete an address.
     */
    public function destroy(Address $address)
    {
        try {
            DB::beginTransaction();

            $address->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Address deleted successfully.',
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Address deletion failed.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
