<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function unit()
    {
        return $this->hasMany('App\Unit','studentId');
    }
    public function QuizState()
    {
        return $this->hasMany('App\QuizState','studentCode');
    }
    protected $rememberTokenName = false;
    protected $fillable = [
        'username', 'password','fullName','state',
    ];
    protected $hidden = [
        'password',
    ];

}
