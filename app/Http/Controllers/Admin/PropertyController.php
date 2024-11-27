<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyPhoto;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(5);

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_type' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'price' => 'required',
            'bed_rooms' => 'required|integer',
            'bath_rooms' => 'required|integer',
            'square_footage' => 'required|numeric',
            'year_built' => 'required|integer',
            'listing_status' => 'required|in:available,sold,pending',
            'date_listed' => 'required|date',
            'main_image' => 'required|image',
        ]);


        if ($request->hasFile('main_image') && $request->file('main_image')->isValid()) {
            $img_name = rand() . time() . $request->file('main_image')->getClientOriginalName();
            $request->file('main_image')->move(public_path('uploads'), $img_name);
        } else {
            return back()->withErrors('No image file was uploaded.');
        }


        Property::create([
            'property_type' => $request->property_type,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'price' => $request->price,
            'bed_rooms' => $request->bed_rooms,
            'bath_rooms' => $request->bath_rooms,
            'square_footage' => $request->square_footage,
            'year_built' => $request->year_built,
            'listing_status' => $request->listing_status,
            'date_listed' => $request->date_listed,
            'main_image' => $img_name,
        ]);


        return redirect()->route('admin.properties.index')
            ->with('msg', 'Property created successfully')
            ->with('type', 'success');
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
        $property = Property::findOrFail($id);

        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'property_type' => 'required',
        ]);

        $property = Property::findOrFail($id);

        $img_name = $property->main_image;

        if ($request->hasFile('main_image')) {
            $img_name = rand() . time() . $request->file('main_image')->getClientOriginalName();

            $request->file('main_image')->move(public_path('uploads'), $img_name);
        }

        $property->update([
            'property_type' => $request->property_type,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'price' => $request->price,
            'bed_rooms' => $request->bed_rooms,
            'bath_rooms' => $request->bath_rooms,
            'square_footage' => $request->square_footage,
            'year_built' => $request->year_built,
            'listing_status' => $request->listing_status,
            'date_listed' => $request->date_listed,
            'main_image' => $img_name,
        ]);

        return redirect()->route('admin.properties.index')->with('msg', 'Property updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);
        File::delete(public_path('uploads/' . $property->image));

        $property->delete();

        return redirect()->route('admin.properties.index')->with('msg', 'Property deleted successfully')->with('type', 'danger');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');


        if ($request->has('query')) {
            $query = $request->input('query');
            $properties = Property::where('city', 'LIKE', '%' . $query . '%')
                                  ->orWhere('zip_code', 'LIKE', '%' . $query . '%')
                                  ->paginate(10);
        } else {

            $properties = Property::paginate(10);
        }

        return view('admin.properties.index', compact('properties'));
    }
}
