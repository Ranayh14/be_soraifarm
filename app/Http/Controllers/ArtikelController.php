<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArtikelController extends Controller
{
    public function index()
    {
        return Artikel::all();
    }

    public function store(StoreArtikelRequest $request)
    {
        try {
            $artikel = Artikel::create($request->validated());
            return response()->json([
                'message' => 'Artikel berhasil ditambahkan',
                'data' => $artikel
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan artikel: ' . $e->getMessage()], 500);
        }
    }

    public function show(Artikel $artikel)
    {
        return $artikel;
    }

    public function update(StoreArtikelRequest $request, Artikel $artikel)
    {
        try {
            $artikel->update($request->validated());
            return response()->json([
                'message' => 'Artikel berhasil diperbarui',
                'data' => $artikel
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui artikel: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Artikel $artikel)
    {
        try {
            $artikel->delete();
            return response()->json([
                'message' => 'Artikel berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus artikel: ' . $e->getMessage()], 500);
        }
    }

    public function bookmark(Request $request, $id)
    {
        try {
            $user = $request->user();
            $user->artikels()->syncWithoutDetaching([$id]);
            return response()->json(['message' => 'Artikel berhasil disimpan']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan artikel: ' . $e->getMessage()], 500);
        }
    }

    public function unbookmark(Request $request, $id)
    {
        $user = $request->user();
        $user->artikels()->detach($id);
        return response()->json(['message' => 'Artikel batal disimpan']);
    }
}
