<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artikels = [
            [
                'title' => 'Mengenal Tanaman Sorgum',
                'kategori' => 'pengenalan',
                'author' => 'Dr. Tani',
                'detail_artikel' => 'Sorgum (Sorghum bicolor L.) adalah tanaman serbaguna yang dapat digunakan sebagai sumber pangan, pakan ternak, dan bahan baku industri. Sebagai bahan pangan, sorgum berada pada urutan ke-5 setelah gandum, jagung, padi, dan jelai. Sorgum dikenal memiliki daya adaptasi yang luas, tahan terhadap kekeringan, dan dapat tumbuh di lahan marjinal.',
                'image' => 'images/sorgum-field.jpg',
            ],
            [
                'title' => 'Manfaat Kesehatan Mengonsumsi Sorgum',
                'kategori' => 'manfaat',
                'author' => 'Siti Nurhaliza',
                'detail_artikel' => 'Sorgum kaya akan nutrisi seperti protein, serat, zat besi, kalsium, fosfor, dan vitamin B. Beberapa manfaat kesehatan dari mengonsumsi sorgum antara lain: 1. Aman untuk penderita celiac karena bebas gluten. 2. Membantu mengontrol kadar gula darah. 3. Menjaga kesehatan pencernaan karena tinggi serat. 4. Menurunkan risiko penyakit jantung.',
                'image' => 'images/sorgum-grain.jpg',
            ],
            [
                'title' => 'Cara Menanam Sorgum yang Efektif',
                'kategori' => 'cara menanam',
                'author' => 'Budi Santoso',
                'detail_artikel' => '1. Persiapan Lahan: Gemburkan tanah dan bersihkan dari gulma. 2. Penanaman: Tanam benih sedalam 3-5 cm dengan jarak tanam 70x20 cm. 3. Pemupukan: Berikan pupuk Urea, SP-36, dan KCL sesuai dosis anjuran. 4. Perawatan: Lakukan penyiangan dan penyiraman secara berkala. 5. Panen: Sorgum siap panen sekitar 3-4 bulan setelah tanam.',
                'image' => 'images/planting-sorgum.jpg',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
