<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(5);

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'job' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|max:1024'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/reviews'), $img_name);

            Review::create([
                'name' => $request->name,
                'description' => $request->description,
                'job' => $request->job,
                'stars' => $request->stars,
                'image' => 'uploads/reviews/' . $img_name,
            ]);

            return redirect()->route('admin.reviews.index')->with('msg', 'Review added successfully')->with('type', 'success');
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
        $review = Review::findOrFail($id);

        return view('admin.reviews.edit', compact('review'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'job' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $review = Review::findOrFail($id);
        $img_name = $review->image; // Retain current image if no new image is uploaded

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($img_name && File::exists(public_path($img_name))) {
                File::delete(public_path($img_name));
            }

            // Upload new image
            $img_name = 'uploads/reviews/' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/reviews'), basename($img_name));
        }

        $review->update([
            'name' => $request->name,
            'description' => $request->description,
            'job' => $request->job,
            'stars' => $request->stars,
            'image' => $img_name, // Correctly store the image path without re-adding 'uploads/reviews'
        ]);

        return redirect()->route('admin.reviews.index')->with('msg', 'Review updated successfully')->with('type', 'info');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);

        if ($review->image && File::exists(public_path($review->image))) {
            File::delete(public_path($review->image));
        }

        $review->delete();

        return redirect()->route('admin.reviews.index')->with('msg','Review deleted successfully')->with('type','danger');
    }
}
