<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtikelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'nullable|string',
            'kategori' => 'required|in:pengenalan,manfaat,cara menanam',
            'author' => 'required|string',
            'detail_artikel' => 'required|string',
        ];
    }
}
