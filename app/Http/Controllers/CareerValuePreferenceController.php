
<?php

namespace App\Http\Controllers;

use App\Models\CareerValuePreference;
use App\Http\Requests\StoreCareerValuePreferenceRequest;
use App\Http\Requests\UpdateCareerValuePreferenceRequest;

class CareerValuePreferenceController extends Controller
{
    public function index()
    {
        return response()->json(
            CareerValuePreference::with([
                'assessmentSession',
                'indicator'
            ])->paginate(10)
        );
    }

    public function store(StoreCareerValuePreferenceRequest $request)
    {
        $preference = CareerValuePreference::create($request->validated());

        return response()->json([
            'message' => 'Career value preference created successfully.',
            'data' => $preference
        ], 201);
    }

    public function show(CareerValuePreference $careerValuePreference)
    {
        return response()->json(
            $careerValuePreference->load([
                'assessmentSession',
                'indicator'
            ])
        );
    }

    public function update(
        UpdateCareerValuePreferenceRequest $request,
        CareerValuePreference $careerValuePreference
    ) {
        $careerValuePreference->update($request->validated());

        return response()->json([
            'message' => 'Career value preference updated successfully.',
            'data' => $careerValuePreference
        ]);
    }

    public function destroy(CareerValuePreference $careerValuePreference)
    {
        $careerValuePreference->delete();

        return response()->json([
            'message' => 'Career value preference deleted successfully.'
        ]);
    }
}

