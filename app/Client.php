<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Email;

class Client extends Model
{
    protected $fillable = [
        'company', 'name', 'position','email' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function emails(){
        return $this->belongsToMany(Email::class);
    }
}
