<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the form for editing the about page.
     * There's only one about page, so we use firstOrNew.
     */
    public function edit()
    {
        $about = About::firstOrNew([]);
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the about page content.
     */
    public function update(Request $request)
    {
        $about = About::firstOrNew([]);
        
        $validatedData = $request->validate([
            'tentang_kami' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        $about->fill($validatedData)->save();

        return redirect()->route('admin.abouts.edit')->with('success', 'About page updated successfully!');
    }
}