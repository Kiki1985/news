<?php

namespace App;

class Category extends Model
{
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
