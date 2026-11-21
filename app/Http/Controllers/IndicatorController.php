<?php 

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Http\Requests\StoreIndicatorRequest;
use App\Http\Requests\UpdateIndicatorRequest;

class IndicatorController extends Controller
{
    public function index()
    {
        return response()->json(
            Indicator::with('assessmentDimension')->paginate(10)
        );
    }

    public function store(StoreIndicatorRequest $request)
    {
        $indicator = Indicator::create($request->validated());

        return response()->json([
            'message' => 'Indicator created successfully.',
            'data' => $indicator
        ], 201);
    }

    public function show(Indicator $indicator)
    {
        return response()->json(
            $indicator->load('assessmentDimension')
        );
    }

    public function update(
        UpdateIndicatorRequest $request,
        Indicator $indicator
    ) {
        $indicator->update($request->validated());

        return response()->json([
            'message' => 'Indicator updated successfully.',
            'data' => $indicator
        ]);
    }

    public function destroy(Indicator $indicator)
    {
        $indicator->delete();

        return response()->json([
            'message' => 'Indicator deleted successfully.'
        ]);
    }
}
