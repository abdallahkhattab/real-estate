<?php

namespace App\Http\Controllers\Site;

use App\Models\Agent;
use App\Models\Review;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    function index()
    {
        $properties = Property::where('listing_status', 'available')->get();
        $reviews = Review::all();
        $agents = Agent::paginate(3);

        $soldPropertiesCount = Property::where('listing_status', 'sold')->count();

        return view('site.index', compact('properties', 'reviews', 'agents', 'soldPropertiesCount'));
    }

    function properties()
    {
        $properties = Property::where('listing_status', 'available')->paginate(6);

        return view('site.properties', compact('properties'));
    }

    function search_properties(Request $request)
    {
        $query = $request->input('query');

        $properties = Property::where('listing_status', 'available');

        if ($query) {
            $properties->where(function ($q) use ($query) {
                $q->where('city', 'like', '%' . $query . '%')
                    ->orWhere('zip_code', 'like', '%' . $query . '%');
            });
        }

        $properties = $properties->paginate(9);

        return view('site.search_properties', compact('properties'));
    }


    function show($id)
    {
        $property = Property::with('photos')->findOrFail($id);

        return view('site.property-single', compact('property'));
    }

    function agents()
    {
        $agents = Agent::paginate(9);

        return view('site.agents', compact('agents'));
    }

    function contact_us()
    {
        return view('site.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::send([], [], function (Message $message) use ($data) {
            $message->to('recipient@example.com')
                ->subject($data['subject'])
                ->html(
                    '<p><strong>Name:</strong> ' . $data['name'] . '</p>' .
                    '<p><strong>Email:</strong> ' . $data['email'] . '</p>' .
                    '<p><strong>Message:</strong> ' . $data['message'] . '</p>'
                );
        });

        return redirect()->route('site.contact_us')->with('msg', 'Your message has been sent successfully!')->with('type', 'success');
    }
}
