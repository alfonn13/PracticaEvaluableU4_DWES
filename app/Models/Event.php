<?php

// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id', 'nombre_evento', 'fecha', 'ubicacion'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class);
    }
}



