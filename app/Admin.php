<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $rememberTokenName = false;

    protected $fillable = [
    'fname', 'lname', 'username','password','level',
];
    protected $hidden = [
        'password',
    ];


}
