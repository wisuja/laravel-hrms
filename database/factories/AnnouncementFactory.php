<?php

namespace Database\Factories;

use App\Models\Announcement;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'created_by' => function () {
                return Employee::factory()->create()->id;
            }
        ];
    }
}
