<?php

namespace App;
use App\Answer;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
      'question_name','question_description','image','start_date','end_date','status',
    ];

    // public function Answer()
    // {
    //     return $this->hasMany('App\Answer');
    // }

    public function answers() {
      return $this->hasOne('App\Answer');
    }
}
