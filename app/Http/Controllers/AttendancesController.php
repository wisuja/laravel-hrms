<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceTime;
use App\Models\AttendanceType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    private $attendances;
    private $attendanceTimes;
    private $attendanceTypes;

    public function __construct()
    {
        $this->middleware('auth');  
        
        $this->attendances = resolve(Attendance::class);

        $this->attendanceTimes = resolve(AttendanceTime::class)->get();
        $this->attendanceTypes = resolve(AttendanceType::class)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = $this->attendances->paginate();

        $alreadyCheckedInAndOut = false;

        return view('pages.attendances', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inId = $this->getId($this->attendanceTimes, "IN");
        $outId = $this->getId($this->attendanceTimes, "OUT");
        
        $now = Carbon::now('Asia/Jakarta');
        $checkInTime = Carbon::createFromTime(8,0,0,'Asia/Jakarta');
        $checkOutTime = Carbon::createFromTime(16,0,0,'Asia/Jakarta');

        $type = "";
        $time = "";

        if($request->sick == 1) {
            $type = "SICK";
            $time = "OTHER";
        } else { 
            $checkForAttendance = Attendance::whereBetween('created_at', [Carbon::today('Asia/Jakarta'), Carbon::tomorrow('Asia/Jakarta')])
                                                ->where('employee_id', auth()->user()->employee->id)
                                                ->whereIn('attendance_time_id', [$inId, $outId])
                                                ->first();
            
            if ($checkForAttendance === null) {
                $time = "IN";

                if($now > $checkInTime) {
                    return redirect()->route('attendances')->with('status', 'Please wait for checkin time.');
                }

                if($now <= $checkInTime) {
                    $type = "ONTIME";
                } else {
                    $type = "LATE";
                }
            } else if ($checkForAttendance->attendance_time_id !== $inId || $checkForAttendance->attendance_time_id !== $outId) {
                if($checkForAttendance->attendance_time_id == $inId) {
                    $time = "OUT";

                    if($now < $checkOutTime) {
                        return redirect()->route('attendances')->with('status', 'Please wait for checkout time.');
                    }

                    if($now == $checkOutTime) {
                        $type = "ONTIME";
                    } else {
                        $type = "OVERTIME";
                    }
                } else {
                    $time = "IN";

                    if($now <= $checkInTime) {
                        $type = "ONTIME";
                    } else {
                        $type = "LATE";
                    }
                }
            }
        }

        $this->attendances->create([
            'employee_id' => auth()->user()->employee->id,
            'attendance_time_id' => $this->getId($this->attendanceTimes, $time),
            'attendance_type_id' => $this->getId($this->attendanceTypes, $type),
            'message' => $request->input('message'),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function print() 
    {
        $attendances = Attendance::all();
        return view('pages.attendances_print', compact('attendances'));
    }

    public function getId ($array, $type) 
    {
        return $array->filter(function ($item) use ($type) {
            return $item->name == $type;
        })->first()->id;
    }
    
}
