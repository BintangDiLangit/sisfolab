<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = array(2,3,4);
        return [

            'noId' => $this->faker->unique()->randomNumber,
            'username' => $this->faker->username,
            'firstname' => $this->faker->firstname,
            'lastname' => $this->faker->lastname,
            'tlp' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'role_id' => $this->faker->randomElement($roles),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'is_admin'=>'0',
            'password' => bcrypt('111'), // password
            'remember_token' => Str::random(10),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}