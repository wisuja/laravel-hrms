<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => function () {
                return Employee::factory()->create()->id;
            },
            'identity_number' => $this->faker->randomDigit(),
            'name' => $this->faker->name(),
            'gender' => 'L',
            'date_of_birth' => $this->faker->date(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetName(),
            'photo' => 'photos/profile-picture.png',
            'cv' => 'cv.jpg',
            'last_education' => 'SMA',
            'gpa' => 4.0,
            'work_experience_in_years' => 0
        ];
    }
}
