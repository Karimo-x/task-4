<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{

public function managerUser(User $user) {
    return $user->is_admin;
}

}
