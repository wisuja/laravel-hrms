<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeScore extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName() {
        return 'group_id';
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y h:m:s');
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function scoreCategory() {
        return $this->belongsTo(ScoreCategory::class);
    }

    public function scoredBy() {
        return $this->belongsTo(Employee::class, 'scored_by');
    }

    public function getSimplifiedScores($count = 10) {
        if(auth()->user()->isAdmin()) {
            return $this->with('employee', 'scoredBy', 'scoreCategory')->latest()->groupBy('group_id')->paginate($count);
        } else {
            return $this->with('employee', 'scoredBy', 'scoreCategory')->where('employee_id', auth()->user()->employee->id)->latest()->groupBy('group_id')->paginate($count);
        }
    }
    
    public function getDataToCreate() {
        $data = [];

        $employees = Employee::where('is_active', 1)->orderBy('id')->get();
        $scoreCategories = ScoreCategory::all();

        $data["employees"] = $employees;
        $data["scoreCategories"] = $scoreCategories;

        return $data;
    }

    public function getEmployeeScoreDetail($group_id = "") {
        return $this->with('scoreCategory')->where('group_id', $group_id)->get();
    }
}
