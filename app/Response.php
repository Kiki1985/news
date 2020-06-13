<?php

namespace App;

use App\Events\ResponseCreated;

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

    protected $dispatchesEvents = [
        'created' => ResponseCreated::class
    ];
}
