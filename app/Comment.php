<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'is_active',
        'author',
        'email',
        'body'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function commentReplies(){
        return $this->hasMany('App\CommentReplies');
    }
}
