<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function get($count = 3) {
        return $this->where('department_id', null)->latest()->take($count)->get();
    }

    public function paginate($count = 10) {
        return $this->with('creator', 'department')->latest()->paginate($count);
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
}
