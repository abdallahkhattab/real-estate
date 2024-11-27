<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Support\Facades\File;

class AgentsController extends Controller
{
    public function index()
    {
        $agents = Agent::paginate(5);

        return view('admin.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.agents.create');
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
            'image' => 'nullable|image|max:1024'
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/agents'), $img_name);

            Agent::create([
                'name' => $request->name,
                'description' => $request->description,
                'job' => $request->job,
                'image' => 'uploads/agents/' . $img_name,
            ]);

            return redirect()->route('admin.agents.index')->with('msg', 'Agent added successfully')->with('type', 'success');
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
        $agent = Agent::findOrFail($id);

        return view('admin.agents.edit', compact('agent'));
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $agent = Agent::findOrFail($id);
        $img_name = $agent->image; // Retain current image if no new image is uploaded

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image if exists
            if ($img_name && File::exists(public_path($img_name))) {
                File::delete(public_path($img_name));
            }

            // Upload new image
            $img_name = 'uploads/agents/' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/agents'), basename($img_name));
        }

        $agent->update([
            'name' => $request->name,
            'description' => $request->description,
            'job' => $request->job,
            'image' => $img_name, // Correctly store the image path without re-adding 'uploads/agents'
        ]);

        return redirect()->route('admin.agents.index')->with('msg', 'Agent updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agent = Agent::findOrFail($id);

        if ($agent->image && File::exists(public_path($agent->image))) {
            File::delete(public_path($agent->image));
        }

        $agent->delete();

        return redirect()->route('admin.agents.index')->with('msg','Agent deleted successfully')->with('type','danger');
    }
}
