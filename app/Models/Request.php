<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'device_name',
        'device_type',
        'description',
        'appointment_time',
        'place_of_appointment',
        'price',
        'account_id'
    ];
}
