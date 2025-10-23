<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::orderBy('order')->get();
        $servicesSection = Section::where('name', 'services')->first();

        if ($request->ajax()) {
            return view('admin.services.partials.index-content', compact('services', 'servicesSection'));
        }

        return view('admin.services.index', compact('services', 'servicesSection'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('service_images', 'public');
            $data['image_path'] = $imagePath;
        }

        Service::create($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Service created successfully.', 'redirect_url' => route('admin.services.index')]);
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
            'image_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->hasFile('image_path')) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            
            $imagePath = $request->file('image_path')->store('service_images', 'public');
            $data['image_path'] = $imagePath;
        }

        $service->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Service updated successfully.', 'redirect_url' => route('admin.services.index')]);
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service, Request $request)
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }
        $service->delete();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Service deleted successfully.', 'redirect_url' => route('admin.services.create')]);
        }

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
