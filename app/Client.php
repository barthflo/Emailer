<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\EmailTemplate;

class Client extends Model
{
    protected $fillable = [
        'company', 'name', 'position','email', 'user_id' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function emails(){
        return $this->belongsToMany(EmailTemplate::class);
    }
    public function mailIsSent()
    {
        $this->sent=true;
        return $this->save();
    }

    public function templateExists()
    {
        return auth()->user()->emails->all();
    }
}
