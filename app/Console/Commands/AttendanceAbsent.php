<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\AttendanceTime;
use App\Models\AttendanceType;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AttendanceAbsent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:absent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will inserts records of employees who does not check in every 4pm.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employees = Employee::where('is_active' , 1)->get();
        $attendances = Attendance::whereBetween('created_at', [Carbon::today('Asia/Jakarta'), Carbon::tomorrow('Asia/Jakarta')])->get();
        $attendanceTimeId = AttendanceTime::whereName('OTHER')->first()->id;
        $attendanceTypeId = AttendanceType::where('name', ["ABSENT"])->first()->id;

        foreach($employees as $employee) {
            $hasCheckedIn = $attendances->contains( function ($attendance, $key) use ($employee){
                return $attendance->employee_id == $employee->id;
            });

            if($hasCheckedIn) {
                continue;
            } else {
                Attendance::create([
                    'employee_id' => $employee->id,
                    'attendance_time_id' => $attendanceTimeId,
                    'attendance_type_id' => $attendanceTypeId,
                ]);
            }
        }
    }
}
