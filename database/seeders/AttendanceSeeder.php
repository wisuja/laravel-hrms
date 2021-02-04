<?php

namespace Database\Seeders;

use App\Models\AttendanceTime;
use App\Models\AttendanceType;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attendanceTimes = ["IN", "OUT", "OTHER"];
        $attendanceTypes = ["ONTIME", "LATE", "OVERTIME", "SICK", "ABSENT", "ON_LEAVE_DAYS"];

        foreach($attendanceTimes as $time) 
        {
            AttendanceTime::factory()->create(['name' => $time]);
        }

        foreach($attendanceTypes as $type)
        {
            AttendanceType::factory()->create(['name' => $type]);
        }
    }
}
