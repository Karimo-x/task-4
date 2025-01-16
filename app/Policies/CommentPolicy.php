<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CommentPolicy
{
    public function ownerCommentDelete(User $user, Comment $comment)
    {
        return $comment->user->id == auth()->id() || $comment->post->user_id == auth()->id();
    }

    public function ownerCommentupdate(User $user, Comment $comment)
    {
        return auth()->id() == $comment->user_id  ;
    }
}
