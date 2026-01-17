<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iots', function (Blueprint $table) {
            $table->id();
            $table->string('ph_tanah'); // Using string as per typical sensor data, or could be decimal
            $table->string('arah_angin');
            $table->string('kelembapan_tanah');
            $table->enum('sensor_status', ['online', 'offline']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iots');
    }
};
