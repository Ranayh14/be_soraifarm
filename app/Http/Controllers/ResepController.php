<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Http\Requests\StoreResepRequest;
use App\Services\AIService;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index()
    {
        return Resep::all();
    }

    public function store(StoreResepRequest $request)
    {
        $resep = Resep::create($request->validated());
        return response()->json($resep, 201);
    }

    public function show(Resep $resep)
    {
        return $resep;
    }

    public function update(StoreResepRequest $request, Resep $resep)
    {
        $resep->update($request->validated());
        return response()->json($resep);
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();
        return response()->json(null, 204);
    }

    // Logic HPP: Calculate total price from JSON bahan_harga
    public function calculateHPP($id)
    {
        $resep = Resep::findOrFail($id);
        $bahanHarga = $resep->bahan_harga; // Accesses json attribute casted to array

        $total = 0;
        if (is_array($bahanHarga)) {
            foreach ($bahanHarga as $item) {
                // Assuming format: ['name' => 'Name', 'price' => 1000]
                // Adjust logic based on actual JSON structure. 
                // Here trusting that 'price' exists or simple value.
                if (isset($item['price'])) {
                    $total += $item['price'];
                } elseif (is_numeric($item)) {
                     $total += $item;
                }
            }
        }
        
        return response()->json([
            'resep_id' => $resep->id,
            'total_hpp' => $total
        ]);
    }

    public function generateIdeas(Request $request)
    {
        // Using AI Service
        $data = $request->validate([
            'bahan' => 'array',
            'budget' => 'integer'
        ]);
        
        $result = $this->aiService->generateResep($data);
        return response()->json($result);
    }

    // Bookmark Logic
    public function bookmark(Request $request, $id)
    {
        $user = $request->user();
        $user->reseps()->syncWithoutDetaching([$id]);
        return response()->json(['message' => 'Resep bookmarked']);
    }

    public function unbookmark(Request $request, $id)
    {
        $user = $request->user();
        $user->reseps()->detach($id);
        return response()->json(['message' => 'Resep unbookmarked']);
    }
}
