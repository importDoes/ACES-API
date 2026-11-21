<?php

namespace App\Http\Controllers;

use App\Models\QuestionOption;
use App\Http\Requests\StoreQuestionOptionRequest;
use App\Http\Requests\UpdateQuestionOptionRequest;

class QuestionOptionController extends Controller
{
    public function index()
    {
        return response()->json(
            QuestionOption::with([
                'assessmentQuestion',
                'student'
            ])->paginate(10)
        );
    }

    public function store(StoreQuestionOptionRequest $request)
    {
        $option = QuestionOption::create($request->validated());

        return response()->json([
            'message' => 'Question option created successfully.',
            'data' => $option
        ], 201);
    }

    public function show(QuestionOption $questionOption)
    {
        return response()->json(
            $questionOption->load([
                'assessmentQuestion',
                'student'
            ])
        );
    }

    public function update(
        UpdateQuestionOptionRequest $request,
        QuestionOption $questionOption
    ) {
        $questionOption->update($request->validated());

        return response()->json([
            'message' => 'Question option updated successfully.',
            'data' => $questionOption
        ]);
    }

    public function destroy(QuestionOption $questionOption)
    {
        $questionOption->delete();

        return response()->json([
            'message' => 'Question option deleted successfully.'
        ]);
    }
}
