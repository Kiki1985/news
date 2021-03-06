<?php

namespace App\Http\Controllers;

use Request;

use App\Article;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Article $article)
    {
        if (!auth()->user()) {
            return back()->with('message', 'Please Log in for leaving a Replay!');
        }

        $this->validate(request(), [
            'body' => 'required|min:3|max:2555'
        ]);

        $authorId = auth()->user()->id;

        $image = auth()->user()->image;

        $articleId = $article->id;

        $comment = Comment::where('article_id', $articleId)->latest()->first();

        if ($comment) {
            if ($articleId == $comment->article_id && $authorId == $comment->author_id) {
                $comment = "Wait for someone to respond ...";
                session()->flash("message", $comment);
            } else {
                $comment = Comment::create([
                'body'=>request('body'),
                'author_id' => auth()->user()->id,
                'article_id' => $article->id
                ]);
                session()->flash("message", 'Thanks for commenting!');
            }
        } else {
            $comment = Comment::create([
                'body'=>request('body'),
                'author_id' => auth()->user()->id,
                'article_id' => $article->id
            ]);
            session()->flash("message", 'Thanks for commenting!');
        }

        if (Request::ajax()) {
            return ([$comment, $image]);
        } else {
            return back();
        }
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back();
    }
}
