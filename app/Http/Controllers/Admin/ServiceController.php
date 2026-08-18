<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order', 'asc')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'icon' => 'nullable|max:50',
            'description' => 'required',
            'full_description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:20048',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'features' => 'nullable|string',
            'button_text' => 'nullable|max:50',
            'button_link' => 'nullable|url',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'icon' => $request->icon,
            'description' => $request->description,
            'full_description' => $request->full_description,
            'order' => $request->order ?? 0,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
            'features' => $request->features ? json_encode($request->features) : null,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'button_text' => $request->button_text ?? 'En savoir plus',
            'button_link' => $request->button_link,
        ];

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('services', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service créé avec succès');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $features = $service->features ? json_decode($service->features, true) : [];
        return view('admin.services.edit', compact('service', 'features'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'icon' => 'nullable|max:50',
            'description' => 'required',
            'full_description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10048',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'features' => 'nullable|string',
            'button_text' => 'nullable|max:50',
            'button_link' => 'nullable|url',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'icon' => $request->icon,
            'description' => $request->description,
            'full_description' => $request->full_description,
            'order' => $request->order ?? 0,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active'),
            'features' => $request->features ? json_encode($request->features) : null,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'button_text' => $request->button_text ?? 'En savoir plus',
            'button_link' => $request->button_link,
        ];

        // Gestion de l'image
        if ($request->hasFile('image')) {
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('services', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service modifié avec succès');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service supprimé avec succès');
    }
}
