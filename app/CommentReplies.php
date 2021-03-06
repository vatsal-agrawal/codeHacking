<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplies extends Model
{
    protected $fillable = [
        'comment_id',
        'is_active',
        'author',
        'email',
        'body'
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
