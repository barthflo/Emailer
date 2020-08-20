<?php

namespace App\Http\Controllers;

use App\Email;
use App\Client;
use App\Mail\ServicesPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class EmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create(Client $client)
    {
        
        return view('emails.create', ['client'=>$client]);
    }

    public function store(Client $client)
    {   
        request()->validate(['template-type'=>'required']);
        Mail::to($client->email)->send(new ServicesPromotion($client, $client->emails->first()->location_path));
        Client::where('id',$client->id)->update(['sent'=>1]);
       
        return redirect(route('home'))->with('message', 'Your Email Have Been Sent!');
    }

    public function show(Email $email)
    {
        //
    }

    public function edit(Email $email)
    {
        //
    }

    public function update(Request $request, Email $email)
    {
        //
    }

    public function destroy(Email $email)
    {
        //
    }

}
