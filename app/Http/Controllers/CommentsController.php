<?php

namespace App\Http\Controllers;

use App\Article;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
    	$this->validate(request(), [
            'body' => 'required|min:3|max:2555'
    	]);

        $comment = Comment::create([
            'body'=>request('body'),
            'author_id' => auth()->user()->id,
            'article_id' => request('article_id')
        ]);
    	return ($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
