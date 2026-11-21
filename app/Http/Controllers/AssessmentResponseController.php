<?php

namespace App\Http\Controllers;

use App\Models\AssessmentResponse;
use App\Http\Requests\StoreAssessmentResponseRequest;
use App\Http\Requests\UpdateAssessmentResponseRequest;

class AssessmentResponseController extends Controller
{
    public function index()
    {
        return response()->json(
            AssessmentResponse::with([
                'assessmentSession',
                'assessmentQuestion',
                'questionOption'
            ])->paginate(10)
        );
    }

    public function store(StoreAssessmentResponseRequest $request)
    {
        $response = AssessmentResponse::create($request->validated());

        return response()->json([
            'message' => 'Assessment response created successfully.',
            'data' => $response
        ], 201);
    }

    public function show(AssessmentResponse $assessmentResponse)
    {
        return response()->json(
            $assessmentResponse->load([
                'assessmentSession',
                'assessmentQuestion',
                'questionOption'
            ])
        );
    }

    public function update(
        UpdateAssessmentResponseRequest $request,
        AssessmentResponse $assessmentResponse
    ) {
        $assessmentResponse->update($request->validated());

        return response()->json([
            'message' => 'Assessment response updated successfully.',
            'data' => $assessmentResponse
        ]);
    }

    public function destroy(AssessmentResponse $assessmentResponse)
    {
        $assessmentResponse->delete();

        return response()->json([
            'message' => 'Assessment response deleted successfully.'
        ]);
    }
}

