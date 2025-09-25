<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::all();
        return view('admin.partnerships.index', compact('partnerships'));
    }

    public function create()
    {
        return view('admin.partnerships.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('partnerships', 'public');

            Partnership::create([
                'name' => $request->name,
                'image_path' => $imagePath,
            ]);
        }

        return redirect()->route('admin.partnerships.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partnership $partnership)
    {
        return view('admin.partnerships.edit', compact('partnership'));
    }

    public function update(Request $request, Partnership $partnership)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $partnership->image_path;
        if ($request->hasFile('image')) {
            if ($partnership->image_path) {
                Storage::disk('public')->delete($partnership->image_path);
            }
            $imagePath = $request->file('image')->store('partnerships', 'public');
        }

        $partnership->update([
            'name' => $request->name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.partnerships.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partnership $partnership)
    {
        Storage::disk('public')->delete($partnership->image_path);
        $partnership->delete();

        return redirect()->route('admin.partnerships.index')->with('success', 'Partner deleted successfully.');
    }
}
