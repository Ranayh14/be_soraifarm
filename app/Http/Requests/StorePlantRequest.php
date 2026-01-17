<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'location' => 'required|string',
            'luas_lahan' => 'required|numeric', // Validasi angka
            'skor' => 'required|integer',
            'rekomendasi_tanam' => 'required|string',
        ];
    }
}
