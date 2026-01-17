<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'kategori',
        'author',
        'detail_artikel',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'artikel_user');
    }
}
