<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'category_name' => $this->faker->word, // Generate a random word for category name
            'description' => $this->faker->paragraph, // Generate a random paragraph for description
            'status' => $this->faker->numberBetween(0, 1), // Generate a random integer for status (0 or 1)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}