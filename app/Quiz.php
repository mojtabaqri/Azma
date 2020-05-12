<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    public function test()
    {
        return $this->belongsTo('App\Test');
    }
    protected $table = 'quizzes';

    protected $fillable = [
        'id','caption', 'answer1', 'answer2','answer3','answer4','CorrectAnswer','created_at','updated_at','testId',
    ];
}
