<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validateClient()
    {
        return request()->validate([
            'company'=>'required',
            'name'=>'',
            'position'=>'required',
            'email'=>'required|email'
        ]);
    }

    public function index()
    {
        return view('clients.home', ['clients'=>auth()->user()->clients->reverse()->all()]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store()
    {
        $client = Client::create(array_merge($this->validateClient(), ['user_id'=>auth()->id()]));
        if ($client->templateExists()){
            foreach($client->templateExists() as $template){
                $template->clients()->attach($client->id);
            }
        }
        return redirect(route('home'))->with('message', 'New Client Added!');
    }

    public function show(Client $client)
    {
        return view('clients.show', ['client'=>$client]);
    }
    
    public function edit(Client $client)
    {
        return view('clients.edit', ['client'=>$client]);
    }

    public function update(Client $client)
    {
        $client->update($this->validateClient());
        return redirect(route('clients.show', $client))->with('message', 'Client Have Been Succesfully Updated!');
    }

    public function delete(Client $client)
    {
        $client->delete();
        return redirect(route('home'))->with('message', 'Client Have Been Deleted Succesfully!');
    }

   
}
