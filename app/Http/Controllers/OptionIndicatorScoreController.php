<?php

namespace App\Http\Controllers;

use App\Models\OptionIndicatorScore;
use App\Http\Requests\StoreOptionIndicatorScoreRequest;
use App\Http\Requests\UpdateOptionIndicatorScoreRequest;

class OptionIndicatorScoreController extends Controller
{
    public function index()
    {
        return response()->json(
            OptionIndicatorScore::with(['questionOption', 'indicator'])->paginate(10)
        );
    }

    public function store(StoreOptionIndicatorScoreRequest $request)
    {
        $score = OptionIndicatorScore::create($request->validated());

        return response()->json([
            'message' => 'Option indicator score created successfully.',
            'data' => $score
        ], 201);
    }

    public function show(OptionIndicatorScore $optionIndicatorScore)
    {
        return response()->json(
            $optionIndicatorScore->load(['questionOption', 'indicator'])
        );
    }

    public function update(
        UpdateOptionIndicatorScoreRequest $request,
        OptionIndicatorScore $optionIndicatorScore
    ) {
        $optionIndicatorScore->update($request->validated());

        return response()->json([
            'message' => 'Option indicator score updated successfully.',
            'data' => $optionIndicatorScore
        ]);
    }

    public function destroy(OptionIndicatorScore $optionIndicatorScore)
    {
        $optionIndicatorScore->delete();

        return response()->json([
            'message' => 'Option indicator score deleted successfully.'
        ]);
    }
}
