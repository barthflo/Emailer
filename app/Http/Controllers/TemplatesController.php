<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\EmailTemplate;
use App\Mail\Preview;


class TemplatesController extends Controller
{
    protected function validateTemplate()
    {
        return request()->validate([
            'user_id'=>'required',
            'template_name'=> ['required', Rule::unique('email_templates', 'template_name')->where(function($query){
                return $query->where('user_id', request('user_id'));
            })],
            'sender_account'=>'',
            'content'=>'required',
            'website_url'=>'',
            'social_media'=>'',
            'logo'=>'',
            'banner'=>''
        ]);
    }

    protected function validateUpdate($id)
    {
        return request()->validate([
            'template_name'=>[
                'required', 
                Rule::unique('email_templates')->ignore($id)->where(function($query){
                    return $query->where('user_id', request('user_id'));
                })
            ],
            'content'=>'required',
            'sender_account'=>'',
            'website_url'=>'',
            'social_media'=>'',
            'logo'=>'',
            'banner'=>'' 
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

    public function store()
    {
        switch(request()->input('action')){
            case 'submit':
                $template = EmailTemplate::create($this->validateTemplate());
       
                if ($template->clientExists()){
                    foreach($template->clientExists() as $client){
                        $client->emails()->attach($template->id);
                    };
                }
                return redirect(route('templates.show',$template))->with('message', "The template $template->template_name has been succesfully created!");
            break;
            case 'preview':
                return view('templates.preview', ['preview'=>new Preview($this->validateTemplate())]);  
            break;
        }   
    }

    public function show(EmailTemplate $template)
    {
        
        return view('templates.show', ['template'=>$template, 'preview'=>new Preview($template)]);
    }

    public function edit(EmailTemplate $template)
    {
        return view('templates.edit', ['template'=>$template]);
    }

    public function update(EmailTemplate $template)
    {
        switch(request()->input('action')){
            case 'update':
                $template->update($this->validateUpdate($template->id));
                return redirect(route('templates.show', $template));
            break;
            case 'preview':
                return view('templates.preview', ['preview'=>new Preview(request()), 'template'=>$template]);
            break;
                    
        }
    }

    public function delete(EmailTemplate $template)
    {
        $template->delete();
        return redirect(route('templates.index'));
    }
}
