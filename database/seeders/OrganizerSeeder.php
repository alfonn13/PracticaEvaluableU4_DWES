<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizer;


class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organizer::create([
            'nombre' => 'Organizador Eventos S.A.',
            'contacto' => 'contacto@organizadoreventos.com',
        ]);

        Organizer::create([
            'nombre' => 'Fiestas y Celebraciones Ltda.',
            'contacto' => 'info@fiestasycelebraciones.com',
        ]);
    }
}
