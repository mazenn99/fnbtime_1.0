<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailContactUsController extends Controller
{
    public function contact()
    {
        return view('client.contact');
    }

    /*
     * this to send new email
     * to admin info@fnbtime.com
     * from contact-us page
     */

    public function sendMailContact(ContactUsRequest $request) {
        Mail::to(config('mail.infoMail'))->send(new ContactUs([
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ]));
        return redirect()->back()->with(['success' => 'Successfully Send You\'re message']);
    }
}
