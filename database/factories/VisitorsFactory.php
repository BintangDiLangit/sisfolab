<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Visitors;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'identityNum' => $this->faker->randomDigit,
            'name' => $this->faker->name,
        ];
    }
}