<?php

namespace App;

use App\Category;

use Illuminate\Support\Facades\Storage;

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
        'fName', 'lName', 'email', 'password', 'image',
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
            'body' => $article->body,
            'image' => $article->image->getClientOriginalName()
        ])->categories()->attach($article->category);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id')->latest();
    }

    public function responses()
    {
        return $this->hasMany(Response::class, 'author_id');
    }

    public static function updateProfileImage($image)
    {
        $filename = $image->getClientOriginalName();
        $image->storeAs('images', $filename, 'public');
        auth()->user()->update(['image' => $filename]);
    }

    protected function deleteOldUsersImage()
    {
        if(auth()->user()->image != 'noUser.png') {
            Storage::disk('public')->delete('/images/'.auth()->user()->image);
        }
    }

    protected function deleteOldUsersArticlesImage()
    {
        foreach (auth()->user()->articles as $article) {
            Storage::disk('public')->delete('/images/'.$article->image);
        }
    }

    public static function addUser($atributes)
    {
        $user = User::create([
            'fName' => $atributes['fName'],
            'lName' => $atributes['lName'],
            'email' => $atributes['email'],
            'image' =>'noUser.png',
            'password' => bcrypt($atributes['password'])
        ]);

        if(array_key_exists('image', $atributes)) {
            $filename = $atributes['image']->getClientOriginalName();
            $atributes['image']->storeAs('images', $filename, 'public');
            $user->update([
                'image' => $filename
            ]);
        }
        return $user;
    }

    public function edit($atributes)
    {
        Storage::disk('public')->delete('/images/'.auth()->user()->image);
        User::update([
            'fName' => $atributes['fName'],
            'lName' => $atributes['lName'],
            'email' => $atributes['email'],
            'image' =>'noUser.png',
            'password' => bcrypt($atributes['password'])
        ]);

         if(array_key_exists('image', $atributes)) {
            $filename = $atributes['image']->getClientOriginalName();
            $atributes['image']->storeAs('images', $filename, 'public');
            if(auth()->user()->image != 'noUser.png') {
            
            }
            auth()->user()->update([
                'image' => $filename
            ]);
        }
    }
}
