<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IoT extends Model
{
    use HasFactory;

    protected $table = 'iots'; // Explicitly define table name if pluralization is tricky (iot -> iots is standard but good to be safe)

    protected $fillable = [
        'ph_tanah',
        'arah_angin',
        'kelembapan_tanah',
        'sensor_status',
    ];
}
