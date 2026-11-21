<?php

namespace App\Http\Controllers;

use App\Models\PathwayIndicatorMapping;
use App\Http\Requests\StorePathwayIndicatorMappingRequest;
use App\Http\Requests\UpdatePathwayIndicatorMappingRequest;

class PathwayIndicatorMappingController extends Controller
{
    public function index()
    {
        return response()->json(
            PathwayIndicatorMapping::with([
                'careerPathway',
                'indicator'
            ])->paginate(10)
        );
    }

    public function store(StorePathwayIndicatorMappingRequest $request)
    {
        $mapping = PathwayIndicatorMapping::create($request->validated());

        return response()->json([
            'message' => 'Pathway indicator mapping created successfully.',
            'data' => $mapping
        ], 201);
    }

    public function show(PathwayIndicatorMapping $pathwayIndicatorMapping)
    {
        return response()->json(
            $pathwayIndicatorMapping->load([
                'careerPathway',
                'indicator'
            ])
        );
    }

    public function update(
        UpdatePathwayIndicatorMappingRequest $request,
        PathwayIndicatorMapping $pathwayIndicatorMapping
    ) {
        $pathwayIndicatorMapping->update($request->validated());

        return response()->json([
            'message' => 'Pathway indicator mapping updated successfully.',
            'data' => $pathwayIndicatorMapping
        ]);
    }

    public function destroy(PathwayIndicatorMapping $pathwayIndicatorMapping)
    {
        $pathwayIndicatorMapping->delete();

        return response()->json([
            'message' => 'Pathway indicator mapping deleted successfully.'
        ]);
    }
}
