<?php

namespace Database\Seeders;

use App\Models\Plant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have a user to attach the plant to
        $user = User::first();

        if (!$user) {
            $user = User::create([
                'nama_lengkap' => 'Petani Sorgum',
                'email' => 'petani@soraifarm.com',
                'password' => bcrypt('password'),
            ]);
        }

        Plant::create([
            'user_id' => $user->id,
            'location' => 'Lahan Kering Gunungkidul',
            'luas_lahan' => 1500.00, // m2
            'skor' => 85,
            'rekomendasi_tanam' => "Berdasarkan kondisi lahan yang kering dan curah hujan rendah, **Sorgum** adalah pilihan yang sangat tepat. \n\n**Analisis:**\n- Sorgum memiliki toleransi kekeringan yang tinggi.\n- Tanah kapur di Gunungkidul cocok untuk pertumbuhan sorgum.\n\n**Rekomendasi:**\n- Varietas: Bioguma atau Numbu.\n- Waktu Tanam: Awal musim hujan.\n- Pemupukan: Gunakan pupuk organik untuk memperbaiki struktur tanah.",
        ]);
    }
}
