<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\AttendanceTime;
use App\Models\AttendanceType;
use App\Models\EmployeeLeaveRequest;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AttendanceLeave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:leave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will inserts records of employees who is on leave days every 9am';

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
        $employeeLeaveRequests = EmployeeLeaveRequest::where('status', 'APPROVED')->latest()->get();
        $attendanceTimeId = AttendanceTime::whereName('OTHER')->first()->id;
        $attendanceTypeId = AttendanceType::where('name', ["ON_LEAVE_DAYS"])->first()->id;
        
        foreach( $employeeLeaveRequests as $leaveReq ) {
            $from = Carbon::parse($leaveReq->from);
            $to = Carbon::parse($leaveReq->to);

            if(Carbon::now()->between($from, $to)) {
                Attendance::create([
                    'employee_id' => $leaveReq->id,
                    'attendance_time_id' => $attendanceTimeId,
                    'attendance_type_id' => $attendanceTypeId
                ]);
            }
        }
    }
}
