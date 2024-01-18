<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Participant;
use App\Models\Event;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participants = [
            Participant::create(['nombre' => 'Carlos Ruiz', 'email' => 'carlosruiz@example.com']),
            Participant::create(['nombre' => 'Ana Torres', 'email' => 'anatorres@example.com']),
            Participant::create(['nombre' => 'Pedro Gómez', 'email' => 'pedrogomez@example.com']),
            Participant::create(['nombre' => 'Sofia Castro', 'email' => 'sofiacastro@example.com'])
        ];

        $events = Event::all();
        foreach ($events as $event) {
            foreach ($participants as $participant) {
            $event->participants()->attach($participant->id);
        }
}
    }
}
