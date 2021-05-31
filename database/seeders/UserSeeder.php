<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Profile;
use App\Models\Schedule;
use App\Models\Meeting;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear 8 usuarios asignados a la variable users
        $users = User::factory(8)->create();

        foreach ($users as $user) {

            //Crear 8 doctores----------------------------------------------------------
            $doctor = Doctor::factory()->create([
                //Utiliza los las ID de los usuarios ya creados para $doctor->user_id
                "user_id" => $user->id
            ]);

                //Crear Horarios
                for ($i=0; $i < 10; $i++) { 
                    $horarios = Schedule::factory()->create([
                    //Utiliza los las ID de los doctores ya creados para $horario->doctor_id
                    "doctor_id" => $doctor->id
                ]);
                }
                
            

            //Crear reuniones----------------------------------------------------------
            $meet = Meeting::factory()->create([
                //Utiliza los las ID de los usuarios ya creados para $meet->user_id
                "user_id" => $user->id,
                //Utiliza los las ID de los usuarios ya creados para $meet->schedule_id
                "schedule_id" => $horarios->id
            ]);

            //Sincroniza id_especialidad , id_doctor
            $doctor->specialities()->sync(rand(1,10),$doctor->id);
        }





        //Crear 8 usuarios más-  NORMALES ---------------------------------------------------------
        User::factory(8)->create();

        //Selecciona a todos los usuarios asignando a la variable todos
        $users = User::all();

        foreach ($users as $user) {

            //Crear Perfiles igual a la cantidad de usuarios existentes, 8+8=16----------------------------------------------------------
            Profile::factory()->create([

                //Iguala el name de los usuarios a nombre de los prefiles
                "nombre" => $user->name,

                //Iguala el id de los usuarios a user_id de los prefiles
                "user_id" => $user->id
            ]);
        }

    }
}
