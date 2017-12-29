<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
  




    protected $fillable = [
            'title',
            'body',
            'user_id',
            'photo_id',
            'category_id',
            'slug'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->belongsTo('App\Photos');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

}
