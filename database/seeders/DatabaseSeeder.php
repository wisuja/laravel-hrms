<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Recruitment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->admin()->create();
        Role::factory()->user()->create();

        User::factory()->admin()->create();

        Department::factory()->create();
        Position::factory()->create();
        Employee::factory()->create();

        Announcement::factory(10)->create();
        Recruitment::factory(10)->create();
    }
}
