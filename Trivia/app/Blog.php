<?php

namespace App;
use App\BlogImages;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  
    protected $fillable = [
        'title','short_description','description','status',
    ];

    // public function blogimages()
    // {
    //     return $this->hasOne('App\BlogImages','blog_id','id');
    // }
}
