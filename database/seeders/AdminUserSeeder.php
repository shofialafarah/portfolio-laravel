<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => env('ADMIN_USERNAME', 'admin')],
            [
                'name'     => env('ADMIN_NAME', 'Admin'),
                'email'    => env('ADMIN_EMAIL', 'admin@gmail.com'),
                'password' => Hash::make(env('ADMIN_PASSWORD', '123123123')),
                'email_verified_at' => now(),
            ]
        );
    }
}
