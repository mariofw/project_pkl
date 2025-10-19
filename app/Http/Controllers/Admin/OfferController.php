<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('order')->get();
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('offer_images', 'public');
            $data['image_path'] = $path;
        }

        Offer::create($data);

        return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully.');
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->hasFile('image')) {
            if ($offer->image_path) {
                Storage::disk('public')->delete($offer->image_path);
            }
            $path = $request->file('image')->store('offer_images', 'public');
            $data['image_path'] = $path;
        }

        $offer->update($data);

        return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer)
    {
        if ($offer->image_path) {
            Storage::disk('public')->delete($offer->image_path);
        }
        $offer->delete();

        return redirect()->route('admin.offers.index')->with('success', 'Offer deleted successfully.');
    }
}
