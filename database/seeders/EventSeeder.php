<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'organizer_id' => 1,
            'nombre_evento' => 'Concierto Rock',
            'fecha' => '2024-05-15 20:00:00',
            'ubicacion' => 'Estadio Central',
        ]);

        Event::create([
            'organizer_id' => 2,
            'nombre_evento' => 'Feria Gastronómica',
            'fecha' => '2024-06-10 10:00:00',
            'ubicacion' => 'Parque de la Ciudad',
        ]);
    }
}
