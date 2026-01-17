<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Requests\StorePlantRequest;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        // Return only logged in user's plants
        return $request->user()->plants;
    }

    public function store(StorePlantRequest $request)
    {
        $plant = $request->user()->plants()->create($request->validated());
        return response()->json($plant, 201);
    }

    public function show(Plant $plant)
    {
        // Ensure user owns the plant
        if ($plant->user_id !== request()->user()->id) {
            abort(403, 'Unauthorized action.');
        }
        return $plant;
    }

    public function update(StorePlantRequest $request, Plant $plant)
    {
        if ($plant->user_id !== $request->user()->id) {
            abort(403);
        }
        $plant->update($request->validated());
        return response()->json($plant);
    }

    public function destroy(Plant $plant)
    {
        if ($plant->user_id !== request()->user()->id) {
            abort(403);
        }
        $plant->delete();
        return response()->json(null, 204);
    }
}
