<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create()->each(function ($user) {
            $posts = Post::factory(rand(1, 5))->create(['user_id' => $user->id]);
            $posts->each(function ($post) {
                Comment::factory(rand(2, 10))->create(['post_id' => $post->id, 'user_id' => $post->user_id]);
            });
        });
    }
}
