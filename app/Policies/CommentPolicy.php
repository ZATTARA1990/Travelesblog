<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use PhpParser\Comment;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function delComment(User $user, Event $event, Comment $comment)
    {
        return $user->id === $event->user_id||$user->id===$comment->user_id;
    }
}
