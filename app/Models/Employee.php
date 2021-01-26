<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['employeeDetail'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function headOfDepartment() {
        return $this->belongsTo(Department::class, 'head_of');
    }

    public function employeeDetail() {
        return $this->hasOne(EmployeeDetail::class);
    }

    public function employeeLeave() {
        return $this->hasOne(EmployeeLeave::class);
    }

    public function employeeLeaveRequest() {
        return $this->hasMany(EmployeeLeaveRequest::class);
    }

    public function getCount() {
        return $this->count();
    }

    public function get($count = 10) {
        return $this->with('department', 'position', 'headOfDepartment')->latest()->paginate($count);
    }

    public function getEndingContractEmployees($count = 10) {
        return $this->orderBy('end_of_contract', 'ASC')->paginate($count);
    }

    public function getEmployeeLeaveData($count = 10) {
        return $this->with('employeeLeave', 'employeeLeaveRequest')->latest()->paginate($count);
    }
}
