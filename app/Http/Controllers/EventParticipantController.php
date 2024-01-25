<?php

namespace App\Http\Controllers;

use App\Models\EventParticipant;

class EventParticipantController extends Controller
{
    public function index()
    {
        $events = EventParticipant::all();
        return response()->json($events);
    }

}