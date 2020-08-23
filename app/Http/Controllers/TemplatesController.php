<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\EmailTemplate;
use App\Client_Email_Template;

class TemplatesController extends Controller
{
    protected function validateTemplate()
    {
        return request()->validate([
            'template_name'=>'required | unique:email_templates',
            'content'=>'required',
        ]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('templates.index', ['templates'=>EmailTemplate::all()->where('user_id', auth()->id())->sortBy('created_at')->reverse() ]);
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
       
        $template = new EmailTemplate($this->validateTemplate());
        $template->logo = request('logo');
        $template->banner = request('banner');
        $template->sender_account = request('sender_account');
        $template->user_id = auth()->id();
        $template->save();
        
        $clients = auth()->user()->clients->all();
        foreach($clients as $client){
            $client->emails()->attach($template->id);
        };

        //Redirect to show
        return redirect(route('templates.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
