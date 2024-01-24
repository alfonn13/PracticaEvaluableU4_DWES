<?php

namespace App\Http\Controllers;

use App\Models\EventParticipant;
use Illuminate\Http\Request;

class EventParticipantController extends Controller
{
    public function index()
    {
        $eventParticipants = EventParticipant::all();
        return response()->json($eventParticipants);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'event_id' => 'required|exists:events,id',
                'participant_id' => 'required|exists:participants,id',
            ]);

            $eventParticipant = new EventParticipant();
            $eventParticipant->event_id = $request->input('event_id');
            $eventParticipant->participant_id = $request->input('participant_id');
            $eventParticipant->save();

            return response()->json($eventParticipant, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show(string $id)
    {
        $eventParticipant = EventParticipant::findOrFail($id);
        return response()->json($eventParticipant);
    }

    public function update(Request $request, string $id)
    {
        try {
            $eventParticipant = EventParticipant::findOrFail($id);

            $request->validate([
                'event_id' => 'required|exists:events,id',
                'participant_id' => 'required|exists:participants,id',
            ]);

            $eventParticipant->event_id = $request->input('event_id');
            $eventParticipant->participant_id = $request->input('participant_id');
            $eventParticipant->save();

            return response()->json($eventParticipant, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function destroy(string $id)
    {
        $eventParticipant = EventParticipant::findOrFail($id);
        $eventParticipant->delete();

        return response()->json(['message' => 'Participante de evento eliminado'], 200);
    }
}
