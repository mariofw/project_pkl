<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => 'what_we_offer',
            'title' => 'What We Offer',
            'subtitle' => 'Let your home have a breath of fresh air.',
        ]);

        Section::create([
            'name' => 'services',
            'title' => 'Layanan Kami',
            'subtitle' => 'Solusi Pertanian Modern',
        ]);

        Section::create([
            'name' => 'about',
            'title' => 'TENTANG KAMI',
            'subtitle' => 'Hidroponik Organik Untuk Masa Depan Sehat',
        ]);

        Section::create([
            'name' => 'partners',
            'title' => 'Our Partners',
            'subtitle' => 'Kami Bekerja Sama dengan Mitra Terpercaya',
        ]);

        Section::create([
            'name' => 'blog',
            'title' => 'Our Blog',
            'subtitle' => 'Berita & Blog Terbaru Kami',
        ]);
    }
}