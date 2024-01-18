<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDetail; 

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDetail::create([
            'user_id' => 1, // Asegúrate de que este ID exista en la tabla 'users'
            'direccion' => 'Calle Falsa 123, Ciudad',
            'telefono' => '123456789',
        ]);

        UserDetail::create([
            'user_id' => 2, // Asegúrate de que este ID exista en la tabla 'users'
            'direccion' => 'Avenida Siempre Viva 456, Ciudad',
            'telefono' => '987654321',
        ]);
    }
}
