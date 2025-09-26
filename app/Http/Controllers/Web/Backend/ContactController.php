<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(
            new ContactMail($request->only('name', 'email', 'message'))
        );

        return back()->with('t-success', 'Your message has been sent successfully!');
    }
}
