<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $offers = Offer::orderBy('order')->get();
        $whatWeOfferSection = Section::where('name', 'what_we_offer')->first();

        if ($request->ajax()) {
            return view('admin.offers.partials.index-content', compact('offers', 'whatWeOfferSection'));
        }

        return view('admin.offers.index', compact('offers', 'whatWeOfferSection'));
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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('offer_images', 'public');
            $data['image_path'] = $imagePath;
        }

        Offer::create($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Offer created successfully.', 'redirect_url' => route('admin.offers.create')]);
        }

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
            'image_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->hasFile('image_path')) {
            if ($offer->image_path) {
                Storage::disk('public')->delete($offer->image_path);
            }
            
            $imagePath = $request->file('image_path')->store('offer_images', 'public');
            $data['image_path'] = $imagePath;
        }

        $offer->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Offer updated successfully.', 'redirect_url' => route('admin.offers.index')]);
        }

        return redirect()->route('admin.offers.index')->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer, Request $request)
    {
        if ($offer->image_path) {
            Storage::disk('public')->delete($offer->image_path);
        }
        $offer->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Offer deleted successfully.', 'redirect_url' => route('admin.offers.create')]);
        }

        return redirect()->route('admin.offers.index')->with('success', 'Offer deleted successfully.');
    }
}
