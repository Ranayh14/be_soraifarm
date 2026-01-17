<?php

namespace App\Http\Controllers;

use App\Models\IoT;
use App\Http\Requests\StoreIoTRequest;
use Illuminate\Http\Request;

class IoTController extends Controller
{
    public function index()
    {
        return IoT::latest()->paginate(20);
    }
    
    // IoT Logic: Get 1 latest sensor data
    public function latest()
    {
        $data = IoT::latest()->first();
        return response()->json($data);
    }

    public function store(StoreIoTRequest $request)
    {
        $iot = IoT::create($request->validated());
        return response()->json($iot, 201);
    }
}
