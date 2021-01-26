<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeDetail;
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
        $user = User::factory()->admin()->create();
        $employee = Employee::factory()->create(['user_id' => $user->id, 'name' => $user->name]);
        EmployeeDetail::factory()->create(['employee_id' => $employee->id, 'name' => $employee->name, 'email' => $user->email]);

        Announcement::factory(10)->create(['created_by' => $employee->id]);
        Recruitment::factory(10)->create(['position_id' => $employee->position_id]);
    }
}
