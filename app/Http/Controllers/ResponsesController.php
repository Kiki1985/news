<?php

namespace App\Http\Controllers;

use Request;

use App\Comment;

use App\Response;

use App\Events\ResponseCreated;

class ResponsesController extends Controller
{
    public function store(Comment $comment)
    {
        $this->validate(request(), [
            'body' => 'required|min:3|max:2555'
        ]);


        $authorId = auth()->user()->id;

        $commentId = $comment->id;

        $response = Response::where('comment_id', $commentId)->latest()->first();

        if ($response) {
            if ($commentId == $response->comment_id && $authorId == $response->author_id) {
                $comment = "Wait for someone to respond ...";
                session()->flash("response", $comment);
            } else {
                $response = Response::create([
                'body'=>request('body'),
                'author_id' => auth()->user()->id,
                'comment_id' => $comment->id
                ]);
            }
        } else {
            $response = Response::create([
            'body'=>request('body'),
            'author_id' => auth()->user()->id,
            'comment_id' => $comment->id
            ]);
        }

        if (Request::ajax()) {
            return ($response);
        } else {
            return back();
        }
    }

    public function destroy(Response $response)
    {
        $this->authorize('delete', $response);
        $response->delete();
        return back();
    }
}
