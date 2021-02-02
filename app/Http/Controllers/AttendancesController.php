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
        //
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
        $inId = $this->attendanceTimes->filter(function ($item) {
            return $item->name == 'IN';
        })->first()->id;
        $outId = $this->attendanceTimes->filter(function ($item) {
            return $item->name == 'OUT';
        })->first()->id;

        $sickId = $this->attendanceTypes->filter(function ($item) {
            return $item->name == 'SICK';
        })->first()->id;

        $attendanceId = $this->attendances->where([
            ['employee_id' ,'=', auth()->user()->employee->id],
            ['attendance_time_id' ,'=', $inId],
            ['created_at' ,'>=', Carbon::today()],
        ])->first()->id;

        if($request->sick == 1) {
            Attendance::whereId($attendanceId)
                    ->update([
                        'attendance_time_id' => $outId,
                        'attendance_type_id' => $sickId, 
                        'message' => $request->input('message'),
                    ]);
            return back();
        }

        $now = Carbon::now('Asia/Jakarta');
        $checkInTime = Carbon::createFromTime(8,0,0,'Asia/Jakarta');
        $checkOutTime = Carbon::createFromTime(16,0,0,'Asia/Jakarta');
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
}
