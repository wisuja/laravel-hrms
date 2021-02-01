<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function checkedBy(){
        return $this->belongsTo(Employee::class, 'checked_by');
    }

    public function paginate($count = 10) {
        return $this->with('employee', 'checkedBy')->latest()->paginate($count);
    }
}
