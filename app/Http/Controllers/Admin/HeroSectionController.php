<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $hero = HeroSection::firstOrCreate([], [
            'title' => 'Default Title',
            'subtitle' => 'Default Subtitle',
        ]);
        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $hero = HeroSection::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'subtitle', 'button_text', 'button_link');

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($hero->image_path) {
                Storage::disk('public')->delete($hero->image_path);
            }
            // Store new image
            $path = $request->file('image')->store('hero_images', 'public');
            $data['image_path'] = $path;
        }

        $hero->update($data);

        return redirect()->route('admin.hero.edit')->with('success', 'Hero Section updated successfully.');
    }
}
