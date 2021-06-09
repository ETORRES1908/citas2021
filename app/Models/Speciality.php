<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Meeting;

class Speciality extends Model
{
    use HasFactory;

    protected $paginationTheme = "bootstrap";

    protected $guarded = [];


    //UNA DOCTOR PERTENECE  A MUCHOS DOCTORES
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    // Muchas especialdiades aparecen en los registros de las citas

   public function meetings()
   {
       return $this->hasMany(Meeting::class);
   }


}
