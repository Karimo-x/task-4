<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    public function ownerPost(User $user , Post $post){
    
        return $user->id == $post->user->id;
    }
}
