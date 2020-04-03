<?php

namespace App;

class Category extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class)->latest("created_at");
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }
}
