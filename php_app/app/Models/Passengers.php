<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passengers extends Model
{
    protected $table="passengers";
    protected $fillable=[
        'name',
        'age',
        'gender',
        'address',
        'email',
        'phone'
    ];
}
