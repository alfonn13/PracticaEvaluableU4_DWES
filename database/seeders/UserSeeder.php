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
        User::create([
            'name' => 'Juan Perez',
            'email' => 'juanperez@example.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'name' => 'Maria Lopez',
            'email' => 'marialopez@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
