<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            [
                'namaMatkul'=>'Sains Kesehatan',
            ],
            [
                'namaMatkul'=>'Ilmu Biomedik I',
            ],
            [
                'namaMatkul'=>'Ilmu Keperawatan Dasar I',
            ],
            [
                'namaMatkul'=>'Antropologi Kesehatan',
            ],
            [
                'namaMatkul'=>'Epidemiologi',
            ],
            [
                'namaMatkul'=>'Ilmu Biomedik II',
            ],
            [
                'namaMatkul'=>'Ilmu Keperawatan Dasar II',
            ],
            [
                'namaMatkul'=>'Keperawatan Sistem Pencernaan',
            ],
        ];

        foreach ($matkul as $key => $value) {
            Matkul::create($value);
        }
    }
}