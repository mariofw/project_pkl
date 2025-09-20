<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSectionImage extends Model
{
    use HasFactory;

    protected $fillable = ['hero_section_id', 'image_path'];

    public function heroSection()
    {
        return $this->belongsTo(HeroSection::class);
    }
}
