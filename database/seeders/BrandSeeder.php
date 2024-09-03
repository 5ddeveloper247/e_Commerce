<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 brands
        // Brand::factory()->count(10)->create();
        DB::table('brands')->insert([
            [
                'title' => 'Daikin',
                'description' => 'Daikin',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lennox',
                'description' => 'Lennox',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Amana',
                'description' => 'Amana',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Goodman',
                'description' => 'Goodman',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trane',
                'description' => 'Trane',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rheem',
                'description' => 'Rheem',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'American Standard',
                'description' => 'American Standard',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lg',
                'description' => 'Lg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'YORK',
                'description' => 'YORK',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}