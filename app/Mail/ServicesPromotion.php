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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client, $templatePath)
    {
        $this->client=$client;
        $this->templatePath = $templatePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown($this->templatePath)->with([
            'companyName'=> $this->client->company,
            'responsibleName'=>$this->client->name,
            'responsiblePosition'=>$this->client->position,
            'content'=>$this->client->emails->first()->content
        ]);
    }
}
