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
                'username' => 'admin', 
                'email' => 'admin@email.com', 
                'password' => Hash::make('admin'), 
                'address' => '-',
                'phoneNumber' => '-',
                // 'gender' => '-',
                // 'dob' => '2001-08-12',
                'image' => '',
                'role' => 'admin'
            ],
            [
                'username' => 'user', 
                'email' => 'user@email.com', 
                'password' => Hash::make('user'), 
                'address' => 'HI',
                'phoneNumber' => '+62139123822',
                // 'gender' => 'Laki-laki',
                // 'dob' => '2001-08-12',
                'image' => '',
                'role' => 'user'
                ]
        ];

        DB::table('users')->insert($users);
    }
}
