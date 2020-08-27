<?php

namespace App\Mail;
use App\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServicesPromotion extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client, $templateName)
    {
        $this->client=$client;
        $this->user=$client->user;
        $this->template=auth()->user()->emails->where('template_name', $templateName)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->markdown('templates.base')->with([
                        'content'=>$this->template->content,
                        'accountname'=>$this->template->sender_account,
                        'logo'=>$this->template->logo,
                        'banner'=>$this->template->banner,
                        'url'=>$this->template->website_url,
                        'social_media'=>$this->template->social_media
                    ]);
     
    }
}
