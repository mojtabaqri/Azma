<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tclass extends Model
{
    public function unit()
    {
        return $this->hasMany('App\Unit','classId');
    }
    protected $fillable = [
        'id', 'name','masterId',
    ];
}
