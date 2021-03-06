<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected  $fillable=[
        'comment_id',
        'photo',
        'is_active',
        'author',
        'email',
        'body'
    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
