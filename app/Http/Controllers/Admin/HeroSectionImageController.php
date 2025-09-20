<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\HeroSectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionImageController extends Controller
{
    public function index()
    {
        $images = HeroSectionImage::all();
        return view('admin.hero-images.index', compact('images'));
    }

    public function create()
    {
        if (HeroSectionImage::count() >= 5) {
            return redirect()->route('admin.hero-images.index')->with('error', 'You can only upload a maximum of 5 images.');
        }
        return view('admin.hero-images.create');
    }

    public function store(Request $request)
    {
        if (HeroSectionImage::count() >= 5) {
            return redirect()->route('admin.hero-images.index')->with('error', 'You can only upload a maximum of 5 images.');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $heroSection = HeroSection::firstOrCreate([]);

        $path = $request->file('image')->store('hero_images', 'public');

        HeroSectionImage::create([
            'hero_section_id' => $heroSection->id,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.hero-images.index')->with('success', 'Image uploaded successfully.');
    }

    public function destroy(HeroSectionImage $hero_image)
    {
        Storage::disk('public')->delete($hero_image->image_path);
        $hero_image->delete();

        return redirect()->route('admin.hero-images.index')->with('success', 'Image deleted successfully.');
    }
}
