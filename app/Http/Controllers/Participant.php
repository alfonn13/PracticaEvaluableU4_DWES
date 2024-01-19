<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return response()->json($participants);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'email' => 'required|email|unique:participants',
            ]);

            $participant = new Participant();
            $participant->nombre = $request->input('nombre');
            $participant->email = $request->input('email');
            $participant->save();

            return response()->json($participant, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show(string $id)
    {
        $participant = Participant::findOrFail($id);
        return response()->json($participant);
    }

    public function update(Request $request, string $id)
    {
        try {
            $participant = Participant::findOrFail($id);

            $request->validate([
                'nombre' => 'required|string',
                'email' => 'required|email|unique:participants,email,' . $participant->id,
            ]);

            $participant->nombre = $request->input('nombre');
            $participant->email = $request->input('email');
            $participant->save();

            return response()->json($participant, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function destroy(string $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return response()->json(['message' => 'Participante eliminado'], 200);
    }
}
