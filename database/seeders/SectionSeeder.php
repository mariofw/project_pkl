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
    }
}