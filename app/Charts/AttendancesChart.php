<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Attendance;
use App\Models\AttendanceTime;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class AttendancesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $inId = AttendanceTime::where('name', 'IN')->first()->id;
        $todayCheckedInCount = Attendance::where('attendance_time_id', $inId)->whereBetween('created_at', [Carbon::today(), Carbon::tomorrow()])->count();
        $yesterdayCheckedInCount = Attendance::where('attendance_time_id', $inId)->whereBetween('created_at', [Carbon::yesterday(), Carbon::today()])->count();
        $twoDaysAgoCheckedInCount = Attendance::where('attendance_time_id', $inId)->whereBetween('created_at', [Carbon::today()->subDays(2), Carbon::yesterday()])->count();
        
        return Chartisan::build()
            ->labels(['Today', 'Yesterday', 'Two Days Ago'])
            ->dataset('CheckedIn', [$todayCheckedInCount, $yesterdayCheckedInCount, $twoDaysAgoCheckedInCount]);
    }
}