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
    public function __construct(Client $client, $templatePath)
    {
        $this->client=$client;
        $this->templatePath = $templatePath;
        $this->user=$client->user;
        $this->template=$client->user->emails->where('name', $templatePath)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("emails.$this->templatePath")->with([
            'content'=>$this->template->content,
            'accountname'=>$this->template->account,
            'logo'=>'https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/82048056_1407732309394843_3049565468948955136_n.png?_nc_cat=102&_nc_sid=09cbfe&_nc_ohc=73nQTR5DDJIAX-9F3E6&_nc_ht=scontent-cdg2-1.xx&oh=5c46144b91d27952ee443666d509a679&oe=5F65A060',
            'banner'=>'https://scontent-cdt1-1.xx.fbcdn.net/v/t1.0-9/118203855_1603811776453561_54959372879088845_o.jpg?_nc_cat=101&_nc_sid=9267fe&_nc_ohc=CnxNpAdYeOoAX-F3Xdv&_nc_ht=scontent-cdt1-1.xx&oh=9c17f72c443a20b1ea3118460747081c&oe=5F64DDBA'
        ]);
    }
}
