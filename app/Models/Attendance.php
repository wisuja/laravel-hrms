<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function attendanceTime() {
        return $this->belongsTo(AttendanceTime::class);
    }

    public function attendanceType() {
        return $this->belongsTo(AttendanceType::class);
    }

    public function paginate ($count = 10) {
        if(auth()->user()->isAdmin()) {
            return $this->with('employee', 'attendanceTime', 'attendanceType')->latest()->paginate($count);
        } else {
            return $this->with('employee', 'attendanceTime', 'attendanceType')->where('employee_id', auth()->user()->employee->id)->latest()->paginate($count);
        }
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
}
