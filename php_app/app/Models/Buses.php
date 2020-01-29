<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    protected $table="buses";
    protected $fillable=[
        'name',
        'bus_number',
        'start_time',
        'end_time',
        'duration',
        'regular',
        'non_regular',
        'seats_number',
        'from',
        'to'
    ];
}
