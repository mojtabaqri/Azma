<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Test extends Model
{
    public function quiz()
    {
        return $this->hasMany('App\Quiz','testId');
    }

    protected $table = 'tests';
    protected $fillable = [
       'id','name', 'masterId','time','state','created_at','updated_at','expireMin',
    ];



}
