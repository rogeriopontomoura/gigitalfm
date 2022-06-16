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
            'description' => $this->faker->sentence(),
            'type_id' => $this->faker->randomDigit(2,10),
            'is_active' => 1,
            'color' => $this->faker->hexColor(),
        ];
    }
}
