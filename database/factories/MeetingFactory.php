<?php

namespace Database\Factories;

use App\Models\Meeting;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meeting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "descripcion"=>$this->faker->realText(100),
            "observacion_med"=>$this->faker->realText(100),
            "estado"=>$this->faker->randomElement(["0","1","2"]),
            "speciality_id" => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        ];
    }
}
