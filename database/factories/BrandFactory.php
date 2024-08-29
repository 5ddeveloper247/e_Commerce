<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Brand;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        return [
            'title' => $this->faker->company, // Generate a random company name
            'description' => $this->faker->paragraph, // Generate a random paragraph for description
            'url' => $this->faker->url, // Generate a random URL
            'status' => $this->faker->boolean(80), // 80% chance of being true (active)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}