<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeder Data 
        DB::table('users')->insert([

            //admin data seed
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //agent data seed
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
            ],
            //user data seed
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
            ]
        ]);
    }
}
