<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name();
        $slug = str()->slug($name);

        return [
            'author_id' => User::query()->inRandomOrder()->first() ?? User::factory(),
            'name' => $name,
            'slug' => $slug,
            'price' => fake()->randomFloat(2, 10),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
        ];
    }
}
