<?php

namespace App;
use App\Blog;
use Illuminate\Database\Eloquent\Model;

class BlogImages extends Model
{

    protected $table = 'blogimages';
    
    protected $fillable = ['image','blog_id'];


    // public function blog()
    // {
    //     return $this->hasOne('App\Blog','');
    // }

}
