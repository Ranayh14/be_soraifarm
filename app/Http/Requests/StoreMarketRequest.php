<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'lokasi' => 'required|string',
            'skor_kecocokan' => 'required|integer',
            'deskripsi' => 'required|string',
        ];
    }
}
