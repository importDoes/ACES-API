<?php

namespace App\Http\Controllers;

use App\Models\CareerPathway;
use App\Http\Requests\StoreCareerPathwayRequest;
use App\Http\Requests\UpdateCareerPathwayRequest;

class CareerPathwayController extends Controller
{
    public function index()
    {
        return response()->json(CareerPathway::paginate(10));
    }

    public function store(StoreCareerPathwayRequest $request)
    {
        $pathway = CareerPathway::create($request->validated());

        return response()->json([
            'message' => 'Career pathway created successfully.',
            'data' => $pathway
        ], 201);
    }

    public function show(CareerPathway $careerPathway)
    {
        return response()->json($careerPathway);
    }

    public function update(
        UpdateCareerPathwayRequest $request,
        CareerPathway $careerPathway
    ) {
        $careerPathway->update($request->validated());

        return response()->json([
            'message' => 'Career pathway updated successfully.',
            'data' => $careerPathway
        ]);
    }

    public function destroy(CareerPathway $careerPathway)
    {
        $careerPathway->delete();

        return response()->json([
            'message' => 'Career pathway deleted successfully.'
        ]);
    }
}

