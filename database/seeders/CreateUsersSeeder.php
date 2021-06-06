<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'noId' => '01',
                'username'=>'Admin',
                'firstname'=>'Bintang Miftaqul',
                'lastname'=>'Huda',
                'email'=>'admin@a.com',
                'is_admin'=>'1',
                'role_id' => '1',
                'password'=> bcrypt('123456'),
                'tlp' => '087266362323',
                'address' => 'Jl. Admin',
            ],
            [
                'noId' => '19650093',
                'username'=>'User',
                'firstname'=>'Halimatus',
                'lastname'=>'Sakdiyah',
                'email'=>'user@u.com',
                'is_admin'=>'0',
                'role_id' => '2',
                'password'=> bcrypt('123456'),
                'tlp' => '087266362323',
                'address' => 'Jl. User',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
        User::factory()->times(100)->create();
    }
}