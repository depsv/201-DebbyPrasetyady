<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
            [
                'name' => 'User A',
                'email' => 'user_a@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'User B',
                'email' => 'user_b@example.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
        ]);
    }
}
