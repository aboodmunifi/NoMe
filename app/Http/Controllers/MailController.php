<?php

namespace App\Http\Controllers;

use App\Mail\EmailDemo;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendEmail(Request $request) {
        // return $request;
        $email = $request->email;
   
        $mailData = [
            'title' => $email,
            'name' => $request->name,
            'message' => $request->content,
            'address' => $request->address,
            // 'url' => 'https://www.positronx.io'
        ];

        contact::create([
            'email' => $email,
            'person_name' => $request->name,
            'description' => $request->content,
            'title' => $request->address, 
            'created_at' => now()
        ]);
  
        Mail::to($email)->send(new EmailDemo($mailData));
   
        return redirect()->back();
        // response()->json([
        //     'message' => 'Email has been sent.'
        // ], Response::HTTP_OK);
    }
    public  function index()
    {
       $contact= contact::all();
       return view('admin.page.email.index',compact('contact'));

    }
}
