<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResepRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'kategori' => 'required|in:F&B,Kerajinan,Modal Kecil,Cepat',
            'duration' => 'required|string',
            'difficulty' => 'required|in:mudah,sulit',
            'langkah_langkah' => 'required|string',
            'bahan_harga' => 'required|array', // Validated as array/json
            'image' => 'nullable|string', // Or image validation if file upload
        ];
    }
}
