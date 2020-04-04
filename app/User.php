<?php

namespace App;

use App\Category;

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
        return $this->hasMany(Article::class);
    }

    public function publish(Article $article)
    {
        $name = Category::where('name', $article->category);

        if(!$name)
        {
            $name->save($article->category);
            $id = $category->id;
        }else{
            $id = $name->value('id');    
        }

        $this->articles()->create([
            'title' => $article->title,
            'body' => $article->body
        ])->categories()->attach($id);
    }
}