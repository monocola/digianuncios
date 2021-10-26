<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketRespuesta extends Model
{
    protected $table='tickets_respuestas';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
