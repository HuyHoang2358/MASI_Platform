<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['id' => 1, 'parent_id' => null, 'name' => 'Electronics', 'slug' => 'electronics', 'icon' => 'icon-electronics', 'description' => 'All electronic items'],
            ['id' => 2, 'parent_id' => 1, 'name' => 'Laptops', 'slug' => 'laptops', 'icon' => 'icon-laptops', 'description' => 'All kinds of laptops'],
            ['id' => 3, 'parent_id' => 1, 'name' => 'Smartphones', 'slug' => 'smartphones', 'icon' => 'icon-smartphones', 'description' => 'All kinds of smartphones'],
            ['id' => 4, 'parent_id' => 2, 'name' => 'Gaming Laptops', 'slug' => 'gaming-laptops', 'icon' => 'icon-gaming-laptops', 'description' => 'Laptops for gaming'],
            ['id' => 5, 'parent_id' => 2, 'name' => 'Ultrabooks', 'slug' => 'ultrabooks', 'icon' => 'icon-ultrabooks', 'description' => 'Lightweight laptops'],
            ['id' => 6, 'parent_id' => 3, 'name' => 'Android Phones', 'slug' => 'android-phones', 'icon' => 'icon-android-phones', 'description' => 'Smartphones with Android OS'],
            ['id' => 7, 'parent_id' => 3, 'name' => 'iPhones', 'slug' => 'iphones', 'icon' => 'icon-iphones', 'description' => 'Apple iPhones'],
        ]);
    }
}
