<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory(8)->create();

        foreach ($users as $user) {
            $doctor = Doctor::factory()->create([
                "user_id" => $user->id
            ]);
                                                //id_especialidad , id_doctor
                $doctor->specialities()->sync(rand(1,5),$doctor->id);
                $doctor->specialities()->sync(rand(6,10),$doctor->id);
        }

        User::factory(8)->create();

        $todos = User::all();

        foreach ($todos as $todo) {
            Profile::factory()->create([
                "nombre" => $todo->name,
                "user_id" => $todo->id
            ]);
        }

    }
}
