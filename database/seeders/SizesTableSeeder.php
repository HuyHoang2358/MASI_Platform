<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sizes')->insert([
            ['name' => 'Small', 'weight' => '40kg', 'height' => '1m40-1m50', 'chest' => '120cm', 'description' => 'lorem lorem lorem',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medium', 'weight' => '50kg', 'height' => '1m50-1m60', 'chest' => '130cm', 'description' => 'lorem lorem lorem', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Large', 'weight' => '60kg', 'height' => '1m60-1m70', 'chest' => '140cm', 'description' => 'lorem lorem lorem', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'X-Large', 'weight' => '70kg', 'height' => '1m70-1m80', 'chest' => '150cm', 'description' => 'lorem lorem lorem', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'XX-Large', 'weight' => '80kg', 'height' => '1m80-1m90', 'chest' => '160cm', 'description' => 'lorem lorem lorem', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
