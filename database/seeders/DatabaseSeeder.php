<?php

// DatabaseSeeder - vytvara zakladnych uzivatelov (admin a bezny) a vola ProductSeeder.

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
        public function run(): void
    {
        // Bežný používateľ
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        // Admin používateľ
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => true,
        ]);

        $this->call(ProductSeeder::class);
    }

}
