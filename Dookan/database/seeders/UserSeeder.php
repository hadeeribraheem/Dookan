<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin user',
                'username' => 'adminuser',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => hash::make('password'),
            ],
            [
                'name' => 'Seller user',
                'username' => 'selleruser',
                'email' => 'seller@gmail.com',
                'role' => 'seller',
                'status' => 'active',
                'password' => hash::make('password'),
            ],
            [
                'name' => 'customer',
                'username' => 'customer',
                'email' => 'customer@gmail.com',
                'role' => 'customer',
                'status' => 'active',
                'password' => hash::make('password'),
            ]
        ]);
    }
}
