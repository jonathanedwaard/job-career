<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Jonathan Edward Andrian",
                "email" => "andrian.jedward@gmail.com",
                "password" => bcrypt('joniganteng'),
                "role" => 'Admin',
                "dateofbirth" => "2001-11-25"
            ],
        ];

        foreach ($users as $user) {
            User::insert($user);
        }
    }
}
