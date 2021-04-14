<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Recruitment;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recruitment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $position = Position::factory()->create();
        return [
            'position_id' => $position->id,
            'title' => $position->name,
            'description' => $this->faker->paragraph(),
            'is_active' => 1,
        ];
    }
}
