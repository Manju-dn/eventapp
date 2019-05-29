<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   protected $fillable = [
        'ename', 'date', 'location','description',
    ];
    protected $table='events';
}
