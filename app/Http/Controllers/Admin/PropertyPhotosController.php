<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PropertyPhotosController extends Controller
{
    public function index()
    {
        $photos = PropertyPhoto::paginate(5);

        return view('admin.property_photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();

        return view('admin.property_photos.create', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'photo_path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('photo_path') && $request->file('photo_path')->isValid()) {
            $img_name = time() . '_' . $request->file('photo_path')->getClientOriginalName();
            $request->file('photo_path')->move(public_path('uploads/property_photos'), $img_name);

            PropertyPhoto::create([
                'property_id' => $request->property_id,
                'photo_path' => 'uploads/property_photos/' . $img_name,
                'description' => $request->description,
            ]);

            return redirect()->route('admin.property_photos.index')->with('msg', 'Photo added successfully')->with('type', 'success');
        }

        return back()->withErrors('Failed to upload the photo. Please try again.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = PropertyPhoto::findOrFail($id);
        $properties = Property::all();

        return view('admin.property_photos.edit', compact('photo', 'properties'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'photo_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        $photo = PropertyPhoto::findOrFail($id);
        $img_name = $photo->photo_path;

        if ($request->hasFile('photo_path')) {
            if (File::exists(public_path($img_name))) {
                File::delete(public_path($img_name));
            }

            $img_name = 'uploads/property_photos/' . time() . '_' . $request->file('photo_path')->getClientOriginalName();
            $request->file('photo_path')->move(public_path('uploads/property_photos'), $img_name);
        }

        $photo->update([
            'property_id' => $request->property_id,
            'photo_path' => $img_name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.property_photos.index')->with('msg', 'Photo updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = PropertyPhoto::findOrFail($id);

        if (File::exists(public_path($photo->photo_path))) {
            File::delete(public_path($photo->photo_path));
        }

        $photo->delete();

        return redirect()->route('admin.property_photos.index')->with('msg', 'Photo deleted successfully')->with('type', 'danger');
    }
}

