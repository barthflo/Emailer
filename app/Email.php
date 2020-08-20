<?php

namespace App;

use App\User;
use App\Client;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
