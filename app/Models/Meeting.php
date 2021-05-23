<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Schedule;

class Meeting extends Model
{
    use HasFactory;

    //UNA CITA PERTENECE A UN SOLO HORARIO
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
