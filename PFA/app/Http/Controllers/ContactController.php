<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeAgain;

class ContactController extends Controller
{
    public function contact()
    {
        return view("contact");
    }

    public function send(Request $request)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        
        Mail::to($email)->send(new WelcomeAgain($subject, $message));
        
        return response()->json(['message' => 'Email sent successfully'], 200);
    }
}
