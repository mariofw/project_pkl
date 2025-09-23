<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
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
            'cropped_image' => 'required',
        ]);

        $data = $request->only('title', 'description', 'order');

        $imageData = $request->input('cropped_image');
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData)      = explode(',', $imageData);
        $imageData = base64_decode($imageData);
        $imageName = time().'.png';
        $path = 'service_images/'.$imageName;

        Storage::disk('public')->put($path, $imageData);
        $data['image_path'] = $path;

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
            'cropped_image' => 'sometimes|required',
        ]);

        $data = $request->only('title', 'description', 'order');

        if ($request->has('cropped_image') && $request->input('cropped_image')) {
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            
            $imageData = $request->input('cropped_image');
            list($type, $imageData) = explode(';', $imageData);
            list(, $imageData)      = explode(',', $imageData);
            $imageData = base64_decode($imageData);
            $imageName = time().'.png';
            $path = 'service_images/'.$imageName;

            Storage::disk('public')->put($path, $imageData);
            $data['image_path'] = $path;
        }

        $service->update($data);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Service updated successfully.', 'redirect_url' => route('admin.services.index')]);
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
