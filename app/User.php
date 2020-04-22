<?php

namespace App;

use App\Category;

use Auth;

use Illuminate\Support\Str;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fName', 'lName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id')->latest();
    }

    public function publish(Article $article)
    {
        $this->articles()->create([
            'title' => Str::slug($article->title),
            'body' => $article->body
        ])->categories()->attach($article->category);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id')->latest();
    }
}
