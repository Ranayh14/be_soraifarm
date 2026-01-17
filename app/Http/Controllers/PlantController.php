<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Requests\StorePlantRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        // If admin, return all. Else, return user's plants.
        if ($request->user()->isAdmin()) {
            return Plant::all();
        }
        return $request->user()->plants;
    }

    public function store(StorePlantRequest $request)
    {
        try {
            $plant = $request->user()->plants()->create($request->validated());
            return response()->json([
                'message' => 'Lahan berhasil ditambahkan',
                'data' => $plant
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan lahan: ' . $e->getMessage()], 500);
        }
    }

    public function show(Plant $plant)
    {
        // Ensure user owns the plant OR is admin
        if ($plant->user_id !== request()->user()->id && !request()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        return $plant;
    }

    public function update(StorePlantRequest $request, Plant $plant)
    {
        try {
            if ($plant->user_id !== $request->user()->id && !$request->user()->isAdmin()) {
                abort(403);
            }
            $plant->update($request->validated());
            return response()->json([
                'message' => 'Lahan berhasil diperbarui',
                'data' => $plant
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui lahan: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Plant $plant)
    {
        try {
            if ($plant->user_id !== request()->user()->id && !request()->user()->isAdmin()) {
                abort(403);
            }
            $plant->delete();
            return response()->json([
                'message' => 'Lahan berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus lahan: ' . $e->getMessage()], 500);
        }
    }
}
