<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $dt = $this->faker->dateTimeBetween($startDate = '-20 years', $endDate = 'now');
        $date = $dt->format("Y-m-d"); // 1994-09-24

        return [
            "apellido" => $this->faker->lastName,
            "dni" => $this->faker->randomNumber(8),
            "fecha_nac" => $date,
            "edad" => $this->faker->randomNumber(2),
            "sexo" => $this->faker->randomElement(["m","f"])
        ];
    }
}
