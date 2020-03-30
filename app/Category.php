<?php

namespace App;

class Category extends Model
{
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function addArticle($categoryId, $title, $body)
    {
        return Article::create([
            'category_id' => $categoryId,
            'title' => $title,
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }
}
