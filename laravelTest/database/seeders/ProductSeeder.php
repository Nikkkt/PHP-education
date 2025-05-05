<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(60)->create()->each(function (Product $product) {
            $product->author()->associate(User::inRandomOrder()->first());
            $product->save();
        });
    }
}
