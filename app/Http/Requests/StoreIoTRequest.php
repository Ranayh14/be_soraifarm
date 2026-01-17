<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIoTRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ph_tanah' => 'required', // numeric validation can be added if stricter
            'arah_angin' => 'required|string',
            'kelembapan_tanah' => 'required',
            'sensor_status' => 'required|in:online,offline',
        ];
    }
}
