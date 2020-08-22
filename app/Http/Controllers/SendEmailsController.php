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
        return view('emails.show', ['client'=>$client]);
    }

    public function sendEmail(Client $client)
    {   
        request()->validate(['template-type'=>'required']);
        switch(request()->input('action')){
            case 'send':
                Mail::to($client->email)->send(new ServicesPromotion($client, request('template-type')));
                $client->mailIsSent();
            break;
            case 'preview':
                return new ServicesPromotion($client, request('template-type'));
            break;
        }
        
        return redirect(route('home'))->with('message', 'Your Email Have Been Sent!');
    }

}
