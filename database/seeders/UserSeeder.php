<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'Admin'
        ]);

        User::create([
            'name' => 'Siswa 1',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'Siswa'
        ]);
    }
}
