<?php

namespace App\Http\Controllers;

use App\Mail\MailServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        // Determine which form is being submitted by checking for unique fields
        if ($request->has('cname')) {
            // First form
            $validatedData = $request->validate([
                'cname' => 'required|string',
                'cweb' => 'required|url',
                'fullName' => 'required|string',
                'title' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
                'country' => 'required|string',
                'message' => 'required|string',
            ]);
        } else {
            // Second form
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
            ]);
        }

        // Send the email using the same MailServer mailable
        Mail::to('ssl@sunhourgroup.com.kh')->send(new MailServer($validatedData));

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
