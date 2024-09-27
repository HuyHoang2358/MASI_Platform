<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static create(array $array)
 */
class Admin extends Authenticatable
{
    use HasFactory;
    protected string $guard = 'admins';

    protected $fillable = [
        'name', 'email', 'password','profile_photo_path'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
