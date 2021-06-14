<?php

namespace Database\Factories;

use App\Models\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Speciality::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->word(10),
            'descripcion' => $this->faker->text(50),
            'color' => $this -> faker->randomElement(['#D8D8D8','#F7819F','#81DAF5','#F5DA81','#58FA82','#D8CEF6','#F78181','#F5A9F2'])
        ];
    }
}
#D8D8D8','#F7819F','#81DAF5','green','gray']);
