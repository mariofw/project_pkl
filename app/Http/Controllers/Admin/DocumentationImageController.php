<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentationImageController extends Controller
{
    public function index()
    {
        $images = DocumentationImage::all();
        return view('admin.documentation-images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.documentation-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('public/documentation-images');
        $imagePath = str_replace('public/', '', $path);

        DocumentationImage::create(['image_path' => $imagePath]);

        return redirect()->route('admin.documentation-images.index')->with('success', 'Image uploaded successfully.');
    }

    public function destroy(DocumentationImage $documentationImage)
    {
        Storage::delete('public/' . $documentationImage->image_path);
        $documentationImage->delete();

        return redirect()->route('admin.documentation-images.index')->with('success', 'Image deleted successfully.');
    }
}