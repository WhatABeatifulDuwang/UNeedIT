<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
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
