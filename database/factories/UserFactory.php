<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => function() {
                return Role::factory()->create()->id;
            },
            'remember_token' => Str::random(10),
        ];
    }

    public function administrator() {
        return $this->state(function($attributes) {
            return [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$.l6nAxxUdU2gayAYkQW9T.6d/35KCHr.eX3qdN9OrVt5xjX/Skwwu',
                'role_id' => function() {
                    return Role::factory()->admin()->create()->id;
                }
            ];
        });
    }

    public function user() {
        return $this->state(function($attributes) {
            return [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role_id' => function() {
                    return Role::factory()->user()->create()->id;
                }
            ];
        });
    }
}
