<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only(['name', 'email', 'subject', 'message']);

        Mail::send([], [], function (Message $message) use ($data) {
            $message->to('recipient@example.com') // تعديل البريد المستلم
                ->subject($data['subject'])
                ->html(
                    '<p><strong>Name:</strong> ' . $data['name'] . '</p>' .
                        '<p><strong>Email:</strong> ' . $data['email'] . '</p>' .
                        '<p><strong>Message:</strong> ' . $data['message'] . '</p>'
                ); // استخدام html() بدلاً من setBody()
        });

        return back()->with('success', 'Your message has been sent!');
    }
}
