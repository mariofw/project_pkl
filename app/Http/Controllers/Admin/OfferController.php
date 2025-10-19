<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('order')->get();
        $whatWeOfferSection = Section::where('name', 'what_we_offer')->first();
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
            'cropped_image' => 'required',
        ]);

        $data = $request->only('title', 'description', 'order');

        $imageData = $request->input('cropped_image');
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData)      = explode(',', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = time().'.png';
        $path = 'offer_images/'.$imageName;

        Storage::disk('public')->put($path, $imageData);
        $data['image_path'] = $path;

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
            'cropped_image' => 'sometimes|required',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->has('cropped_image') && $request->input('cropped_image')) {
            if ($offer->image_path) {
                Storage::disk('public')->delete($offer->image_path);
            }
            
            $imageData = $request->input('cropped_image');
            list($type, $imageData) = explode(';', $imageData);
            list(, $imageData)      = explode(',', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = time().'.png';
            $path = 'offer_images/'.$imageName;

            Storage::disk('public')->put($path, $imageData);
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
