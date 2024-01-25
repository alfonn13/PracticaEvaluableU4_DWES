<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Participant;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'organizer_id' => 'required|integer',
                'nombre_evento' => 'required|string',
                'fecha' => 'required|date',
                'ubicacion' => 'required|string',
            ]);

            $event = new Event();
            $event->organizer_id = $request->input('organizer_id');
            $event->nombre_evento = $request->input('nombre_evento');
            $event->fecha = $request->input('fecha');
            $event->ubicacion = $request->input('ubicacion');
            $event->save();

            return response()->json($event, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function update(Request $request, string $id)
    {
        $event = Event::find($id);

        if(!$event){
            return response()->json(['message' => 'Evento no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'organizer_id' => 'required|integer|exists:organizers,id',
            'nombre_evento' => 'required|string',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string',
        ]);
        

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $data = $request->all();
        $data['organizer_id'] = $request->input('organizer_id');

        $event->update($data);
        return response()->json($event, 200);
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Evento eliminado'], 200);


    }

    public function attachParticipant($eventId, $participantId)
    {
        $event = Event::find($eventId);
        $participant = Participant::find($participantId);

        if(!$event || !$participant) {
            return response()->json(['message' => 'Evento o participante no encontrado'], 404);
        }

        $event->participants()->attach($participant);
        return response()->json(['message' => 'Participante agregado al evento'], 200);
    }

    public function detachParticipant($eventId, $participantId)
    {
        $event = Event::find($eventId);
        $participant = Participant::find($participantId);

        if(!$event || !$participant) {
            return response()->json(['message' => 'Evento o participante no encontrado'], 404);
        }

        $event->participants()->detach($participant);
        return response()->json(['message' => 'Participante eliminado del evento'], 200);
    }
}
