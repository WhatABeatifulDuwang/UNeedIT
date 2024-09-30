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
        'first_name',
        'last_name',
        'email',
        'password',
        'admin'
    ];

    protected $hidden = [
        'password',
    ];
}
