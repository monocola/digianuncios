<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'subject', 'body', 'state','user_id','ip'
    ];

    public function scopeUsuario($query)
    {
        return  $query->where('user_id', Auth::user()->id);
    }

    public function scopeEstado($query)
    {
        return  $query->where('state', 0);
    }
}
