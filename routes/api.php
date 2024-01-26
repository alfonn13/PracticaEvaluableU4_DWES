<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\UserDetailController as UserDetail;
use App\Http\Controllers\ParticipantController as Participant;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventParticipantController as EventParticipant;
use App\Http\Controllers\OrganizerController as Organizer;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("users", "App\Http\Controllers\UserController"); 
Route::apiResource("userDetails", "App\Http\Controllers\UserDetailController");
Route::apiResource("participants", "App\Http\Controllers\ParticipantController"); 
Route::apiResource("events", "App\Http\Controllers\EventController");
Route::apiResource("eventParticipants", "App\Http\Controllers\EventParticipantController");
Route::apiResource("organizers", "App\Http\Controllers\OrganizerController");


Route::post('/events/{event}/participants/{participants}',
[EventController::class, 'attachParticipant']);

Route::delete('/events/{event}/participants/{participants}',
[EventController::class, 'detachParticipant']);