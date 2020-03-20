<?php

namespace App;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
      'question_id','answers','correct_answer','status','deleted_at',
    ];

    // public function Question()
    // {
    //     return $this->belongsTo('Question');
    // }

    public function question(){
      return $this->belongsTo('App\Question');
    }

}
