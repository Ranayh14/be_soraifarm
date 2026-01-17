<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('kategori', ['F&B', 'Kerajinan', 'Modal Kecil', 'Cepat']);
            $table->string('duration');
            $table->enum('difficulty', ['mudah', 'sulit']);
            $table->text('langkah_langkah');
            $table->json('bahan_harga');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
