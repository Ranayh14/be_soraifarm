<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        return Artikel::all();
    }

    public function store(StoreArtikelRequest $request)
    {
        $artikel = Artikel::create($request->validated());
        return response()->json($artikel, 201);
    }

    public function show(Artikel $artikel)
    {
        return $artikel;
    }

    public function update(StoreArtikelRequest $request, Artikel $artikel)
    {
        $artikel->update($request->validated());
        return response()->json($artikel);
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return response()->json(null, 204);
    }

    public function bookmark(Request $request, $id)
    {
        $user = $request->user();
        $user->artikels()->syncWithoutDetaching([$id]);
        return response()->json(['message' => 'Artikel bookmarked']);
    }

    public function unbookmark(Request $request, $id)
    {
        $user = $request->user();
        $user->artikels()->detach($id);
        return response()->json(['message' => 'Artikel unbookmarked']);
    }
}
