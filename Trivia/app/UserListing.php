<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserListing extends Model
{
    protected $table = 'userlisting'; 
    protected $fillable = ['name','email','correct_answers','wrong_answers'];
}
