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
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
        ]);

        HeroSection::updateOrCreate(['id' => 1], $request->all());

        if ($request->expectsJson()) {
            session()->flash('success', 'Hero section updated successfully.');
            return response()->json(['redirect_url' => route('admin.hero.edit')]);
        }

        return redirect()->route('admin.hero.edit')->with('success', 'Hero section updated successfully.');
    }
}
