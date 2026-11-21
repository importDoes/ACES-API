<?php

namespace App\Http\Controllers;

use App\Models\PathwayRecommendation;
use App\Http\Requests\StorePathwayRecommendationRequest;
use App\Http\Requests\UpdatePathwayRecommendationRequest;

class PathwayRecommendationController extends Controller
{
    public function index()
    {
        return response()->json(
            PathwayRecommendation::with([
                'assessmentSession',
                'careerPathway'
            ])->paginate(10)
        );
    }

    public function store(StorePathwayRecommendationRequest $request)
    {
        $recommendation = PathwayRecommendation::create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Pathway recommendation created successfully.',
            'data' => $recommendation
        ], 201);
    }

    public function show(PathwayRecommendation $pathwayRecommendation)
    {
        return response()->json(
            $pathwayRecommendation->load([
                'assessmentSession',
                'careerPathway'
            ])
        );
    }

    public function update(
        UpdatePathwayRecommendationRequest $request,
        PathwayRecommendation $pathwayRecommendation
    ) {
        $pathwayRecommendation->update($request->validated());

        return response()->json([
            'message' => 'Pathway recommendation updated successfully.',
            'data' => $pathwayRecommendation
        ]);
    }

    public function destroy(PathwayRecommendation $pathwayRecommendation)
    {
        $pathwayRecommendation->delete();

        return response()->json([
            'message' => 'Pathway recommendation deleted successfully.'
        ]);
    }
}
