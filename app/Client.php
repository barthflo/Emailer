<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;

class Client extends Model
{
    protected $fillable = [
        'company', 'name', 'position','email' 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
