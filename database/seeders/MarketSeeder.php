<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $markets = [
            [
                'nama_produk' => 'Beras Sorgum Merah Organik 1kg',
                'harga' => 35000.00,
                'lokasi' => 'Bandung',
                'skor_kecocokan' => 95,
                'deskripsi' => 'Beras sorgum merah organik berkualitas tinggi, cocok untuk diet dan pengganti nasi. Bebas gluten dan kaya serat.',
            ],
            [
                'nama_produk' => 'Tepung Sorgum Halus 500g',
                'harga' => 20000.00,
                'lokasi' => 'Jakarta Selatan',
                'skor_kecocokan' => 88,
                'deskripsi' => 'Tepung sorgum yang digiling halus, sangat cocok untuk membuat kue, roti, dan cookies bebas gluten.',
            ],
            [
                'nama_produk' => 'Benih Sorgum Unggul Bioguma',
                'harga' => 50000.00,
                'lokasi' => 'Bogor',
                'skor_kecocokan' => 90,
                'deskripsi' => 'Benih sorgum varietas Bioguma, memiliki produktivitas tinggi dan tahan hama. Cocok untuk ditanam di dataran rendah hingga menengah.',
            ],
            [
                'nama_produk' => 'Gula Cair Batang Sorgum',
                'harga' => 45000.00,
                'lokasi' => 'Surabaya',
                'skor_kecocokan' => 85,
                'deskripsi' => 'Pemanis alami yang diekstrak dari batang sorgum manis. Indeks glikemik rendah, aman untuk penderita diabetes.',
            ],
        ];

        foreach ($markets as $market) {
            Market::create($market);
        }
    }
}
