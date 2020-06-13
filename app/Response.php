<?php

namespace App;

//use App\Mail\ResponseCreated;

//use Illuminate\Support\Facades\Mail;

class Response extends Model
{
    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /*protected static function boot()
    {
        parent::boot();
        static::created(function ($response){
            \Mail::to($response->comment->user->email)->send(
                new ResponseCreated($response)
            );

            \Mail::to($response->comment->article->user->email)->send(
                new ResponseCreated($response)
            );
        });
    }*/
}
