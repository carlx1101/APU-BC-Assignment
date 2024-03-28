<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'role'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Doctor',
               'email'=>'doctor@gmail.com',
               'role'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Carl',
               'email'=>'patient@gmail.com',
               'role'=>0,
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
