<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            // 'uuid' => Str::random(25),
            'title' => $this->faker->company(),
            'price' => $this->faker->numberBetween(75000, 350000),
            'desc' => $this->faker->paragraph(),
            'size' => $this->faker->randomElements(['S', 'M', 'L', 'XL', 'XXL'], 3),
            'link'=> $this->faker->url()
        ];
    }
}
