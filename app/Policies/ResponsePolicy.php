<?php

namespace App\Policies;

use App\Response;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResponsePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(User $user, Response $response)
    {
        return $response->author_id == auth()->id() || $response->comment->article->author_id == auth()->id();
    }
}
