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
        'passenger_id'
    ];
}
