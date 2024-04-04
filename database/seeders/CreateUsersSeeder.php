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
                'name' => 'BCD Admin',
                'email' => 'admin@bcd.com',
                'role' => 1,
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'BCD Doctor',
                'email' => 'doctor@bcd.com',
                'role' => 2,
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Doctor 2',
                'email' => 'doctor2@bcd.com',
                'role' => 2,
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'BCD Patient',
                'email' => 'patient@bcd.com',
                'role' => 0,
                'password' => bcrypt('password123'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
