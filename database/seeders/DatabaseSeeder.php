<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Panggil Seeder Admin kamu di sini
        $this->call([
            AdminUserSeeder::class,
        ]);

        // 2. Ini boleh dibiarkan atau dihapus (user pengetesan saja)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'username' => 'testuser',
            'password' => bcrypt('password'),
        ]);
    }
}
