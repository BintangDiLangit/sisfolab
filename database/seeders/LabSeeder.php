<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lab = [
            [
                'namaLab'=>'A',
            ],
            [
                'namaLab'=>'B',
            ],
            [
                'namaLab'=>'C',
            ],
            [
                'namaLab'=>'D',
            ],
            [
                'namaLab'=>'E',
            ],
        ];

        foreach ($lab as $key => $value) {
            Lab::create($value);
        }
    }
}