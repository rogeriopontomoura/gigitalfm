<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->name,
            'category_id' => $this->faker->sentence(2),
            'is_active' => $this->faker->boolean(),
            'color' => $this->faker->hexColor(),
        ];
    }
}
