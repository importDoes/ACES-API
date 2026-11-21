<?php

namespace App\Http\Controllers;

use App\Models\AssessmentSession;
use App\Http\Requests\StoreAssessmentSessionRequest;
use App\Http\Requests\UpdateAssessmentSessionRequest;

class AssessmentSessionController extends Controller
{
    public function index()
    {
        return response()->json(
            AssessmentSession::with('student')->paginate(10)
        );
    }

    public function store(StoreAssessmentSessionRequest $request)
    {
        $session = AssessmentSession::create($request->validated());

        return response()->json([
            'message' => 'Assessment session created successfully.',
            'data' => $session
        ], 201);
    }

    public function show(AssessmentSession $assessmentSession)
    {
        return response()->json(
            $assessmentSession->load('student')
        );
    }

    public function update(
        UpdateAssessmentSessionRequest $request,
        AssessmentSession $assessmentSession
    ) {
        $assessmentSession->update($request->validated());

        return response()->json([
            'message' => 'Assessment session updated successfully.',
            'data' => $assessmentSession
        ]);
    }

    public function destroy(AssessmentSession $assessmentSession)
    {
        $assessmentSession->delete();

        return response()->json([
            'message' => 'Assessment session deleted successfully.'
        ]);
    }
}
