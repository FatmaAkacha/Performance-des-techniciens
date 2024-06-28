<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Mail\WelcomeAgain;

class ContactController extends Controller
{
    public function contact()
    {
        return view("contact");
    }

    public function send(Request $request)
    {
        Mail::to($request->email)->send(new WelcomeAgain());
        return redirect()->back();
    }
}
