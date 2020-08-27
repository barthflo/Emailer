<?php

namespace App\Http\Controllers;


use App\Client;
use App\Mail\ServicesPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Markdown;




class SendEmailsController extends Controller
{

    public $email;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showSenderForm(Client $client)
    {
        return view('sendEmails.show', ['client'=>$client]);
    }

    public function sendEmail(Client $client)
    {   
        request()->validate(['template_name'=>'required']);
        switch(request()->input('action')){
            case 'send':
                dd(new ServicesPromotion($client, request('template_name')));
                Mail::to($client->email)->send(new ServicesPromotion($client, request('template_name')));
                $client->mailIsSent();
                return redirect(route('home'))->with('message', 'Your Email Have Been Sent!');
            break;
            case 'preview':
                return view('templates.preview', ['preview'=>new ServicesPromotion($client, request('template_name'))]);
            break;
        }  
    }

}
