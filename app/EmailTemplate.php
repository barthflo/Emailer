<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class EmailTemplate extends Model
{
    protected $fillable = [
        'template_name', 'content', 'user_id' 
    ];

    public function excerpt()
    {
        return Str::limit($this->content, 1000);
    }

    public function user()
    {
        return $this->belongsTo(App\User::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function clientExists(){
        return auth()->user()->clients->all();
    }
}
