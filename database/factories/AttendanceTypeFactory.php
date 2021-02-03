<?php

namespace Database\Factories;

use App\Models\AttendanceType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AttendanceType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
