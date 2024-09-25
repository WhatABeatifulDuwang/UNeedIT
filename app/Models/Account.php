<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * @method static create(array $array)
 */
class Account extends Model implements AuthenticatableContract
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $connection = 'mysql';
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
