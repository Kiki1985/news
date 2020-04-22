<?php

namespace App\Http\Controllers;

use App\Article;

use App\Comment;

use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
    	$this->validate(request(), [
            'body' => 'required|min:3|max:2555'
    	]);

    	if (!Auth::check()) {
    		return back()->with('message', 'You must be loged in to create comment.');
    	}

    	$article->addComment(request('body'));
    	return back();
    }
}
