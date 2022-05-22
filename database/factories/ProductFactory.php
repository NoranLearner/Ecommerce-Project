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

        'name' => $this->faker->text(60),

        'description' => $this->faker->paragraph(),

        'slug' => $this->faker->slug(),

        'price' => $this->faker->numberBetween(10, 9000),

        'sku' => $this->faker->word(),

        'manage_stock' => false,

        'in_stock' => $this->faker->boolean(),

        'is_active' => $this->faker->boolean(),

        ];
    }
}
