<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 categories
        // Category::factory()->count(10)->create();
        DB::table('categories')->insert([
            [
                'category_name' => 'Central Air Conditioner',
                'description' => 'Central Air Conditioner',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Ductless Mini-Split',
                'description' => 'Ductless Mini-Split',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Window Air Conditioner',
                'description' => 'Window Air Conditioner',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Portable Air Conditioner',
                'description' => 'Portable Air Conditioner',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Floor-Mounted Air Conditioner',
                'description' => 'Floor-Mounted Air Conditioner',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Smart Air Conditioner',
                'description' => 'Smart Air Conditioner',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Geothermal Air Conditioning System',
                'description' => 'Geothermal Air Conditioning System',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Hybrid / Dual Fuel Air Conditioner',
                'description' => 'Hybrid / Dual Fuel Air Conditioner',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}