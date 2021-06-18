<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dt = $this->faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week');
        $date = $dt->format("Y-m-d"); // 1994-09-24

        return [
            "fecha_atencion"=>$date,
            "hora_inicio"=>$this->faker->time(), // Horas
            "hora_fin"=>$this->faker->time(), // Horas,
            "estado"=> $this->faker->randomElement(["0","1"])
        ];
    }
}
