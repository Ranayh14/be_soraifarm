<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Http\Requests\StoreMarketRequest;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        return Market::all();
    }

    public function store(StoreMarketRequest $request)
    {
        $market = Market::create($request->validated());
        return response()->json($market, 201);
    }

    public function show(Market $market)
    {
        return $market;
    }

    public function update(StoreMarketRequest $request, Market $market)
    {
        $market->update($request->validated());
        return response()->json($market);
    }

    public function destroy(Market $market)
    {
        $market->delete();
        return response()->json(null, 204);
    }
}
