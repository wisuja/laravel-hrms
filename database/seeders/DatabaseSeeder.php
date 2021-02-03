<?php

namespace Database\Seeders;

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
        $this->call([
            EmployeeSeeder::class,
            AttendanceSeeder::class,
            MenuSeeder::class,
            AccessSeeder::class,
            ScoreCategorySeeder::class, 
        ]);
    }
}
