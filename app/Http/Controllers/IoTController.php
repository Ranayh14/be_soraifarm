<?php

namespace App\Http\Controllers;

use App\Models\IoT;
use App\Http\Requests\StoreIoTRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class IoTController extends Controller
{
    public function index()
    {
        return IoT::latest()->get();
    }
    
    // IoT Logic: Get 1 latest sensor data
    public function latest()
    {
        $data = IoT::latest()->first();
        return response()->json($data);
    }

    public function show(IoT $iot)
    {
        return $iot;
    }

    public function store(StoreIoTRequest $request)
    {
        try {
            $iot = IoT::create($request->validated());
            return response()->json([
                'message' => 'Data IoT berhasil diterima',
                'data' => $iot
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan data IoT: ' . $e->getMessage()], 500);
        }
    }
}
