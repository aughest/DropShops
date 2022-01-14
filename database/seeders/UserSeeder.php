<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'full_name' => 'admin', 
                'username' => 'admin', 
                'email' => 'admin@email.com', 
                'password' => Hash::make('admin'), 
                'address' => '-',
                'phoneNumber' => '-',
                'image' => 'profile-photo.png',
                'role' => 'admin'
            ],
            [
                'full_name' => 'user full name', 
                'username' => 'user', 
                'email' => 'user@email.com', 
                'password' => Hash::make('user'), 
                'address' => 'HI',
                'phoneNumber' => '62139123822',
                'image' => 'profile-photo.png',
                'role' => 'user'
                ]
        ];

        DB::table('users')->insert($users);
    }
}
