<?php

namespace App\Http\Controllers;

use App\Models\AssessmentResult;
use App\Http\Requests\StoreAssessmentResultRequest;
use App\Http\Requests\UpdateAssessmentResultRequest;

class AssessmentResultController extends Controller
{
    public function index()
    {
        return response()->json(
            AssessmentResult::with([
                'assessmentSession',
                'careerPathway'
            ])->paginate(10)
        );
    }

    public function store(StoreAssessmentResultRequest $request)
    {
        $result = AssessmentResult::create($request->validated());

        return response()->json([
            'message' => 'Assessment result created successfully.',
            'data' => $result
        ], 201);
    }

    public function show(AssessmentResult $assessmentResult)
    {
        return response()->json(
            $assessmentResult->load([
                'assessmentSession',
                'careerPathway'
            ])
        );
    }

    public function update(
        UpdateAssessmentResultRequest $request,
        AssessmentResult $assessmentResult
    ) {
        $assessmentResult->update($request->validated());

        return response()->json([
            'message' => 'Assessment result updated successfully.',
            'data' => $assessmentResult
        ]);
    }

    public function destroy(AssessmentResult $assessmentResult)
    {
        $assessmentResult->delete();

        return response()->json([
            'message' => 'Assessment result deleted successfully.'
        ]);
    }
}

