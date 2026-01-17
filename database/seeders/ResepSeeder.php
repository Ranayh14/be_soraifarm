<?php

namespace Database\Seeders;

use App\Models\Resep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reseps = [
            [
                'title' => 'Nasi Goreng Sorgum',
                'kategori' => 'F&B',
                'duration' => '30 menit',
                'difficulty' => 'mudah',
                'langkah_langkah' => "1. Rebus beras sorgum hingga empuk.\n2. Tumis bawang merah dan putih hingga harum.\n3. Masukkan sayuran dan sorgum, aduk rata.\n4. Tambahkan kecap manis, garam, dan merica.\n5. Sajikan selagi hangat.",
                'bahan_harga' => [
                    ['nama' => 'Beras Sorgum', 'jumlah' => '200g', 'harga' => 10000],
                    ['nama' => 'Bawang Merah', 'jumlah' => '3 siung', 'harga' => 2000],
                    ['nama' => 'Telur', 'jumlah' => '1 butir', 'harga' => 2500],
                ],
                'image' => 'images/nasi-goreng-sorgum.jpg',
            ],
            [
                'title' => 'Bubur Candil Sorgum',
                'kategori' => 'F&B',
                'duration' => '45 menit',
                'difficulty' => 'mudah',
                'langkah_langkah' => "1. Campur tepung sorgum dengan sedikit air hingga bisa dibentuk bulat.\n2. Rebus gula merah dengan air hingga larut.\n3. Masukkan bola-bola sorgum ke dalam air gula.\n4. Masak hingga bola-bola mengapung.\n5. Tambahkan santan kental, aduk perlahan.",
                'bahan_harga' => [
                    ['nama' => 'Tepung Sorgum', 'jumlah' => '250g', 'harga' => 15000],
                    ['nama' => 'Gula Merah', 'jumlah' => '100g', 'harga' => 5000],
                    ['nama' => 'Santan', 'jumlah' => '200ml', 'harga' => 3000],
                ],
                'image' => 'images/bubur-candil-sorgum.jpg',
            ],
            [
                'title' => 'Cookies Sorgum Choco Chip',
                'kategori' => 'F&B',
                'duration' => '60 menit',
                'difficulty' => 'sulit',
                'langkah_langkah' => "1. Kocok mentega dan gula halus hingga lembut.\n2. Masukkan telur, kocok rata.\n3. Tambahkan tepung sorgum, coklat bubuk, dan baking powder.\n4. Masukkan choco chip, aduk rata.\n5. Cetak adonan dan panggang hingga matang.",
                'bahan_harga' => [
                    ['nama' => 'Tepung Sorgum', 'jumlah' => '300g', 'harga' => 18000],
                    ['nama' => 'Mentega', 'jumlah' => '150g', 'harga' => 10000],
                    ['nama' => 'Choco Chip', 'jumlah' => '50g', 'harga' => 5000],
                ],
                'image' => 'images/cookies-sorgum.jpg',
            ],
        ];

        foreach ($reseps as $resep) {
            Resep::create($resep);
        }
    }
}
