<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AssessmentDimension;

class AssessmentDimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            AssessmentDimension::paginate(10)
        );
    }

    public function store(FormRequest $request)
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
        FormRequest $request,
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
