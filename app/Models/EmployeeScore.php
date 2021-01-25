<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeScore extends Model
{
    use HasFactory;

    protected $guarded = [];

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
        return $this->with('employee', 'scoredBy', 'scoreCategory')->latest()->groupBy('employee_id', 'created_at')->paginate($count);
    } 

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y h:m:s');
    }
}
