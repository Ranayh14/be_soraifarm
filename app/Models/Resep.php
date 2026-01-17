<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'kategori',
        'duration',
        'difficulty',
        'langkah_langkah',
        'bahan_harga',
        'image',
    ];

    protected $casts = [
        'bahan_harga' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'resep_user');
    }
}
