<?php

namespace Database\Factories;

use App\Models\Lab;
use App\Models\Matkul;
use App\Models\Model;
use App\Models\User;
use App\Models\Practice;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
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
        $matkul = Matkul::pluck('id')->toArray();
        $lab = Lab::pluck('id')->toArray();
        $dosen = User::where('role_id', 3)->get()->pluck('username')->all();
        $mhs = User::where('role_id', 2)->get()->pluck('username')->all();
        return [
            'matkul_id' => $this->faker->randomElement($matkul),
            'lab_id' => $this->faker->randomElement($lab),
            'lecturerName' => $this->faker->randomElement($dosen),
            'namaAnggota' => $this->faker->randomElement($mhs),
        ];
    }
}