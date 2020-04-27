<?php

namespace App;

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
}
