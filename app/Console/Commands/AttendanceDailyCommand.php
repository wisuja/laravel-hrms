<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\AttendanceTime;
use App\Models\AttendanceType;
use App\Models\Employee;
use App\Models\EmployeeLeaveRequest;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AttendanceDailyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will insert records into attendance table every day.';

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
        $employees = Employee::all();
        $employeeLeaveRequests = EmployeeLeaveRequest::where('status', 'APPROVED')->latest()->get();
        $attendanceTimeId = AttendanceTime::whereName('IN')->first()->id;
        $attendanceTypes = AttendanceType::whereIn('name', ["ON_LEAVE_DAYS", "ABSENT"])->get();

        foreach($employees as $employee) {
            $absentId = $attendanceTypes->filter(function($item) {
                return $item->name == 'ABSENT';
            })->first()->id;

            $attendanceId = Attendance::create([
                'employee_id' => $employee->id,
                'attendance_time_id' => $attendanceTimeId,
                'attendance_type_id' => $absentId
            ])->id;
            foreach($employeeLeaveRequests as $leaveReq) {
                if($leaveReq->employee_id == $employee->id) {
                    $from = Carbon::parse($leaveReq->from);
                    $to = Carbon::parse($leaveReq->to);

                    if(Carbon::now()->between($from, $to)) {
                        $leaveDayId = $attendanceTypes->filter(function($item) {
                            return $item->name == 'ON_LEAVE_DAYS';
                        })->first()->id;

                        Attendance::whereId($attendanceId)->update([
                            'attendance_type_id' => $leaveDayId
                        ]);
                        break;
                    }
                } else {
                    continue;
                }
            }
        }

        echo "DONE!";
    }
}
