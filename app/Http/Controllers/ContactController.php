<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.viewContactForm');
    }

    public function submitContact(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('contact.contactUsThanks');
        } else {
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $email = $request['email'];
            $inquiry = $request['inquiry'];

            $data = [
                "first_name" => "$first_name",
                "last_name" => "$last_name",
                "email" => "$email",
                "inquiry" => "$inquiry",
            ];

            $user['to'] = env("MAIL_FROM_ADDRESS", "no-reply@cii.com");
            Mail::send('contact.contactUsMail', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Inquiry through mail');
            });

            return redirect()->route('contact-thanks');
        }
    }
}
