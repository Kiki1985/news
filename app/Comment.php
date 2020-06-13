<?php

namespace App;

//use App\Mail\CommentCreated;

//use Illuminate\Support\Facades\Mail;

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

    /*protected static function boot()
    {
        parent::boot();
        static::created(function ($comment){
            Mail::to($comment->article->user->email)->send(
                new CommentCreated($comment)
            );
        });
    }*/
}
