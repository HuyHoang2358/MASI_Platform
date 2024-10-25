<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\Post;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sizes = Size::all();
        $colors = Color::all();
        $categories = Category::all();
        $posts = Post::all();

        Product::factory(10)->create()->each(function ($product) use ($sizes, $colors, $categories, $posts) {
            $product->sizes()->attach($sizes->random(rand(1, 3))->pluck('id')->toArray());
            $product->colors()->attach($colors->random(rand(1, 2))->pluck('id')->toArray());
            $product->category_id = $categories->random()->id;
            $product->post_id = $posts->random()->id;
            $product->save();
        });

    }
}
