<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jilbab; // Pastikan Model Jilbab di-import

class JilbabSeeder extends Seeder
{
    public function run(): void
    {
        // Data produk jilbab yang ingin kamu tambahkan langsung lewat codingan
        $dataJilbabs = [
            [
                'title' => 'ciput rayon',
                'description' => 'adem parah bgt besti',
                'price' => 10000,
                'stock' => 1,
                'image' => 'ciput rayon.jpg',
            ],
            [
                'title' => 'hijab instan',
                'description' => 'praktis tinggal slup, langsung rapi',
                'price' => 27000,
                'stock' => 10,
                'image' => 'hijab instan.jpg',
            ],
            [
                'title' => 'hijab paris',
                'description' => 'tegak di dahi anti leley, bahan premium',
                'price' => 18000,
                'stock' => 15,
                'image' => 'hijab paris.jpg',
            ],
            [
                'title' => 'pashmina ceritu',
                'description' => 'ceruty baby doll premium mudah dibentuk',
                'price' => 35000,
                'stock' => 8,
                'image' => 'pashmina ceritu.jpg',
            ],
            [
                'title' => 'pashmina silk',
                'description' => 'mewah, cocok untuk acara formal',
                'price' => 45000,
                'stock' => 5,
                'image' => 'pashmina silk.jpg',
            ],
            [
                'title' => 'voal premium',
                'description' => 'nyaman dipakai seharian, motif cantik',
                'price' => 50000,
                'stock' => 12,
                'image' => 'voal premium.jpg',
            ],
        ];

        // Looping untuk memasukkan semua data di atas ke database
        foreach ($dataJilbabs as $jilbab) {
            Jilbab::create($jilbab);
        }
    }
}