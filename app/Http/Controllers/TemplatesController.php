<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\EmailTemplate;

class TemplatesController extends Controller
{
    protected function validateTemplate()
    {
        return request()->validate([
            'user_id'=>'required',
            'template_name'=> Rule::unique('email_templates', 'template_name')->where(function($query){
                return $query->where('user_id', request('user_id'));
            }),
            'sender_account'=>'',
            'content'=>'required',
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
        $template = EmailTemplate::create($this->validateTemplate());
        if ($template->clientExists()){
            foreach($template->clientExists() as $client){
                $client->emails()->attach($template->id);
            };
        }
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
