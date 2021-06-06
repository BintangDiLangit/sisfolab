<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cat = array('tool','stuff');
        return [
            'kategori' => $this->faker->randomElement($cat),
            'name' => $this->faker->unique()->colorName,
            'desc' => $this->faker->sentence,
            'stock' => $this->faker->randomDigit,
        ];
    }
}