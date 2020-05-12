<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function tclass()
    {
        return $this->belongsTo('App\Tclass');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    protected $fillable = [
        'classId', 'studentId',
    ];

}
