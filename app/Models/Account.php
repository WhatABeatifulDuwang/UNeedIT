<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
        'street_name',
        'street_number',
        'street_additional',
        'city',
        'country',
        'postal_code',
        'admin'
    ];
}
