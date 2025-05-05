<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition() {
        return [
            'user_id' => User::factory(),
            'title' => fake()->realText(128),
            'content' => fake()->realText(1024),
        ];
    }
}
