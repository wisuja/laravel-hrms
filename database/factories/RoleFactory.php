<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word()
        ];
    }

    public function admin() {
        return $this->state(function($attributes) {
            return [
                'name' => 'Administrator'
            ];
        });
    }

    public function user() {
        return $this->state(function($attributes) {
            return [
                'name' => 'User'
            ];
        });
    }
}
