<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function before(?User $user, string $ability): bool|null
    {
        if ($user?->role === 'admin') {
            return true;
        }
        return null;
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Post $post): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You are not the author of this post.');
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id
            ? Response::allow()
            : Response::deny('You are not the author of this post.');
    }
}
