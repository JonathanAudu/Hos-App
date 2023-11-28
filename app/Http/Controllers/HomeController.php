<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function about(){
        return view('home.about');
    }

    public function healthcare(){
        return view('home.healthcare');
    }

    public function contact(){
        return view('home.contact');
    }

    public function submitinfo(Request $request){

        $html = "
        Hello,
        <br>
        The following user has contacted us.
        <br>
        Name: {$request->input('name')}
        <br>
        Email: {$request->input('email')}
        <br>
        Phone: {$request->input('phone')}
        <br>
        Subject: : {$request->input('subject')}
        <br>
        Message: {$request->input('message')}
        ";

        Mail::send([], [], function (Message $message) use ($html, $request){
            $message
                ->from('no-reply@prediagnosis.org')
                ->to('info@prediagnosis.org')
                ->subject('Doctor Anonymous Request')
                ->html($html);
        });

        $html = "
        Hello {$request->input('name')}
        <br>
        We wish to inform you that we have received your message with the following subject: : {$request->input('subject')}
        <br>
        We would contact you on {$request->input('email')} or {$request->input('phone')} once your request has been handled.
        <br>
        Regards,
        <br>
        Team Doctor Anonymous
        ";
        
        Mail::send([], [], function (Message $message) use ($html, $request){
            $message
                ->from('no-reply@prediagnosis.org')
                ->to($request->input('email'))
                ->subject('Doctor Anonymous')
                ->html($html);
        });
        
        return back()->with('success');
    }

}
