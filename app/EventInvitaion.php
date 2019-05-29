<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInvitaion extends Model
{
   protected $fillable = [
        'user_id', 'event_invited_by', 'event_name','date','location','description','confirm',
    ];
    protected $table='event_invitation';
}
