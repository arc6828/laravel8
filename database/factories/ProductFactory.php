<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph(4),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'photo' => $this->faker->image('public/storage', 200, 200, "books", false),
            'stock' => $this->faker->numberBetween(0, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
