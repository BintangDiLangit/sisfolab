<?php

namespace Database\Seeders;

use App\Models\Visitors;
use Illuminate\Database\Seeder;

class PresensiPengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visitors::factory()->times(112)->create();
    }
}