<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table="tickets";
    protected $fillable=[
        'date',
        'from',
        'to',
        'bus_id',
        'seat_number',
        'departure',
        'arrival',
        'bill',
        'ticket_number',
        'passenger_id',
        'status'
    ];

    public function relations_passenger(){
        return $this->hasOne('App\Models\Passengers','id','passenger_id');
    }

    public function relations_bus(){
        return $this->hasOne('App\Models\Buses','id','bus_id');
    }

}
