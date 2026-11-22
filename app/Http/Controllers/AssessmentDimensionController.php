<?php

namespace App\Http\Controllers;

use App\Models\AssessmentDimension;
use App\Http\Requests\StoreAssessmentDimensionRequest;
use App\Http\Requests\UpdateAssessmentDimensionRequest;

class AssessmentDimensionController extends Controller
{
    public function index()
    {
        return response()->json(
            AssessmentDimension::paginate(10)
        );
    }

    public function store(StoreAssessmentDimensionRequest $request)
    {
        $dimension = AssessmentDimension::create($request->validated());

        return response()->json([
            'message' => 'Assessment dimension created successfully.',
            'data' => $dimension
        ], 201);
    }

    public function show(AssessmentDimension $assessmentDimension)
    {
        return response()->json($assessmentDimension);
    }

    public function update(
        UpdateAssessmentDimensionRequest $request,
        AssessmentDimension $assessmentDimension
    ) {
        $assessmentDimension->update($request->validated());

        return response()->json([
            'message' => 'Assessment dimension updated successfully.',
            'data' => $assessmentDimension
        ]);
    }

    public function destroy(AssessmentDimension $assessmentDimension)
    {
        $assessmentDimension->delete();

        return response()->json([
            'message' => 'Assessment dimension deleted successfully.'
        ]);
    }
}

