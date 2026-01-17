<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Http\Requests\StoreMarketRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MarketController extends Controller
{
    public function index()
    {
        return Market::all();
    }

    public function store(StoreMarketRequest $request)
    {
        try {
            $market = Market::create($request->validated());
            return response()->json([
                'message' => 'Produk berhasil ditambahkan',
                'data' => $market
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambahkan produk: ' . $e->getMessage()], 500);
        }
    }

    public function show(Market $market)
    {
        return $market;
    }

    public function update(StoreMarketRequest $request, Market $market)
    {
        try {
            $market->update($request->validated());
            return response()->json([
                'message' => 'Produk berhasil diperbarui',
                'data' => $market
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui produk: ' . $e->getMessage()], 500);
        }
    }

    public function destroy(Market $market)
    {
        try {
            $market->delete();
            return response()->json([
                'message' => 'Produk berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus produk: ' . $e->getMessage()], 500);
        }
    }
}
