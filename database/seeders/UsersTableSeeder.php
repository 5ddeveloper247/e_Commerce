<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'superadmin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'role' => 0, // 0 for superadmin
                'email' => 'superadmin@example.com',
                'status' => 1, // 1 for active
                'phone' => '1234567890',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Use the Hash facade to hash the password
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'role' => 1, // 1 for admin
                'email' => 'admin@example.com',
                'status' => 1, // 1 for active
                'phone' => '0987654321',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Use the Hash facade to hash the password
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'regularuser',
                'first_name' => 'Regular',
                'last_name' => 'User',
                'role' => 2, // 2 for regular user
                'email' => 'user@example.com',
                'status' => 1, // 1 for active
                'phone' => '1122334455',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // Use the Hash facade to hash the password
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
