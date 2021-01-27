<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function paginate($count = 10) {
        return $this->latest()->paginate($count);
    }
}
