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
            'image' => 'required|string',
        ]);

        $heroSection = HeroSection::firstOrCreate([]);

        $imageData = $request->input('image');
        @list($type, $imageData) = explode(';', $imageData);
        @list(, $imageData)      = explode(',', $imageData);

        if ($imageData) {
            $imageData = base64_decode($imageData);
            $imageName = 'hero_images/' . uniqid() . '.jpg';
    
            Storage::disk('public')->put($imageName, $imageData);
    
            HeroSectionImage::create([
                'hero_section_id' => $heroSection->id,
                'image_path' => $imageName,
            ]);
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Image uploaded successfully.', 'redirect_url' => route('admin.hero-images.index')]);
        }

        return redirect()->route('admin.hero-images.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit(HeroSectionImage $hero_image)
    {
        return view('admin.hero-images.edit', ['image' => $hero_image]);
    }

    public function update(Request $request, HeroSectionImage $hero_image)
    {
        $request->validate([
            'image' => 'sometimes|required|string',
        ]);

        if ($request->has('image') && $request->input('image')) {
            // Delete old image
            Storage::disk('public')->delete($hero_image->image_path);

            $imageData = $request->input('image');
            @list($type, $imageData) = explode(';', $imageData);
            @list(, $imageData)      = explode(',', $imageData);

            if ($imageData) {
                $imageData = base64_decode($imageData);
                $imageName = 'hero_images/' . uniqid() . '.jpg';
        
                Storage::disk('public')->put($imageName, $imageData);

                $hero_image->update([
                    'image_path' => $imageName,
                ]);
            }
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Image updated successfully.', 'redirect_url' => route('admin.hero-images.index')]);
        }

        return redirect()->route('admin.hero-images.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(Request $request, HeroSectionImage $hero_image)
    {
        Storage::disk('public')->delete($hero_image->image_path);
        $hero_image->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
        }

        return redirect()->route('admin.hero-images.index')->with('success', 'Image deleted successfully.');
    }
}
