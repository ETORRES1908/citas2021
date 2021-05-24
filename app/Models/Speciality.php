<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Speciality extends Model
{
    use HasFactory;

    //UNA DOCTOR PERTENECE  A MUCHOS DOCTORES
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }    
}
