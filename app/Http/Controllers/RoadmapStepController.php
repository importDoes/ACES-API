<?php

namespace App\Http\Controllers;

use App\Models\RoadmapStep;
use App\Http\Requests\StoreRoadmapStepRequest;
use App\Http\Requests\UpdateRoadmapStepRequest;

class RoadmapStepController extends Controller
{
    public function index()
    {
        return response()->json(
            RoadmapStep::with('careerIntervention')->paginate(10)
        );
    }

    public function store(StoreRoadmapStepRequest $request)
    {
        $step = RoadmapStep::create($request->validated());

        return response()->json([
            'message' => 'Roadmap step created successfully.',
            'data' => $step
        ], 201);
    }

    public function show(RoadmapStep $roadmapStep)
    {
        return response()->json(
            $roadmapStep->load('careerIntervention')
        );
    }

    public function update(
        UpdateRoadmapStepRequest $request,
        RoadmapStep $roadmapStep
    ) {
        $roadmapStep->update($request->validated());

        return response()->json([
            'message' => 'Roadmap step updated successfully.',
            'data' => $roadmapStep
        ]);
    }

    public function destroy(RoadmapStep $roadmapStep)
    {
        $roadmapStep->delete();

        return response()->json([
            'message' => 'Roadmap step deleted successfully.'
        ]);
    }
}

