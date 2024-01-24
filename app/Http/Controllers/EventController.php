<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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
        try {
            $event = Event::findOrFail($id);

            $request->validate([
                'organizer_id' => 'required|exists:organizers,id',
                'nombre_evento' => 'required|string',
                'fecha' => 'required|date',
                'ubicacion' => 'required|string',
            ]);

            $event->organizer_id = $request->input('organizer_id');
            $event->nombre_evento = $request->input('nombre_evento');
            $event->fecha = $request->input('fecha');
            $event->ubicacion = $request->input('ubicacion');
            $event->save();

            return response()->json($event, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Evento eliminado'], 200);
    }
}
