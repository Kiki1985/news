<?php

namespace App;

class Category extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }
}
