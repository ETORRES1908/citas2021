<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Speciality;
use App\Models\Schedule;

class Doctor extends Model
{
    use HasFactory;

    //UN DOCTOR PERTENECE  A MUCHAS ESPECIALIDADES
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }     

    //UN DOCTOR PERTENECE  A UN SOLO USUARIO
    public function user()
    {   
        return $this->belongsTo(User::class);
    }

    //UN DOCTOR TIENE MUCHOS HORARIOS A SU NOMBRE (ID)

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
        
}
