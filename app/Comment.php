<?php

namespace App;

use App\Events\CommentCreated;

class Comment extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }

    protected $dispatchesEvents = [
        'created' => CommentCreated::class
    ];
}
