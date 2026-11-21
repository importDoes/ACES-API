<?php

namespace App\Http\Controllers;

use App\Models\CareerIntervention;
use App\Http\Requests\StoreCareerInterventionRequest;
use App\Http\Requests\UpdateCareerInterventionRequest;

class CareerInterventionController extends Controller
{
    public function index()
    {
        return response()->json(
            CareerIntervention::with('pathwayRecommendation')->paginate(10)
        );
    }

    public function store(StoreCareerInterventionRequest $request)
    {
        $intervention = CareerIntervention::create($request->validated());

        return response()->json([
            'message' => 'Career intervention created successfully.',
            'data' => $intervention
        ], 201);
    }

    public function show(CareerIntervention $careerIntervention)
    {
        return response()->json(
            $careerIntervention->load('pathwayRecommendation')
        );
    }

    public function update(
        UpdateCareerInterventionRequest $request,
        CareerIntervention $careerIntervention
    ) {
        $careerIntervention->update($request->validated());

        return response()->json([
            'message' => 'Career intervention updated successfully.',
            'data' => $careerIntervention
        ]);
    }

    public function destroy(CareerIntervention $careerIntervention)
    {
        $careerIntervention->delete();

        return response()->json([
            'message' => 'Career intervention deleted successfully.'
        ]);
    }
}
