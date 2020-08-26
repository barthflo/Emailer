<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Client;

class Preview extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($template)
    {
        $this->user = auth()->user();
        $this->client = factory(Client::class)->make(['user_id'=>auth()->id(), 'company'=>'Company Name', 'position'=>'Position Title', 'name'=>'Responsible Name']);
        $this->template = collect($template);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('templates.base')->with([
            'content'=>$this->template['content'],
            'accountname'=>$this->template['sender_account'],
            'logo'=>$this->template['logo'],
            'banner'=>$this->template['banner'],
            'url'=>$this->template['website_url'],
            'social_media'=>$this->template['social_media']
        ]);
    }
}
