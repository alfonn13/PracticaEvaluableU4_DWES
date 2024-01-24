<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizer::all();
        return response()->json($organizers);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string',
                'contacto' => 'required|email|unique:organizers',
            ]);

            $organizer = new Organizer();
            $organizer->nombre = $request->input('nombre');
            $organizer->contacto = $request->input('contacto');
            $organizer->save();

            return response()->json($organizer, 201);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function show(string $id)
    {
        $organizer = Organizer::findOrFail($id);
        return response()->json($organizer);
    }

    public function update(Request $request, string $id)
    {
        try {
            $organizer = Organizer::findOrFail($id);

            $request->validate([
                'nombre' => 'required|string',
                'contacto' => 'required|email|unique:organizers,contacto,' . $organizer->id,
            ]);

            $organizer->nombre = $request->input('nombre');
            $organizer->contacto = $request->input('contacto');
            $organizer->save();

            return response()->json($organizer, 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error'], 500);
        }
    }

    public function destroy(string $id)
    {
        $organizer = Organizer::findOrFail($id);
        $organizer->delete();

        return response()->json(['message' => 'Organizador eliminado'], 200);
    }
}
