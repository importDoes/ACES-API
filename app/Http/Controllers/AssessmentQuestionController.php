<?php

namespace App\Http\Controllers;

use App\Models\AssessmentQuestion;
use App\Http\Requests\StoreAssessmentQuestionRequest;
use App\Http\Requests\UpdateAssessmentQuestionRequest;

class AssessmentQuestionController extends Controller
{
    public function index()
    {
        return response()->json(
            AssessmentQuestion::with([
                'assessmentDimension',
                'indicator'
            ])->paginate(10)
        );
    }

    public function store(StoreAssessmentQuestionRequest $request)
    {
        $question = AssessmentQuestion::create($request->validated());

        return response()->json([
            'message' => 'Assessment question created successfully.',
            'data' => $question
        ], 201);
    }

    public function show(AssessmentQuestion $assessmentQuestion)
    {
        return response()->json(
            $assessmentQuestion->load([
                'assessmentDimension',
                'indicator'
            ])
        );
    }

    public function update(
        UpdateAssessmentQuestionRequest $request,
        AssessmentQuestion $assessmentQuestion
    ) {
        $assessmentQuestion->update($request->validated());

        return response()->json([
            'message' => 'Assessment question updated successfully.',
            'data' => $assessmentQuestion
        ]);
    }

    public function destroy(AssessmentQuestion $assessmentQuestion)
    {
        $assessmentQuestion->delete();

        return response()->json([
            'message' => 'Assessment question deleted successfully.'
        ]);
    }
}
