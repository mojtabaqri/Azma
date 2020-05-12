<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizState extends Model
{
    public function Student()
    {
        return $this->belongsTo('App\Student');
    }
    protected $fillable = [
        'trackingCode','studentCode','expire', 'testId','state','point','falseAnswer','trueAnswer','id','masterCode',
    ];
}
