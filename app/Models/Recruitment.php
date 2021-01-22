<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function get($count = 3) {
        return Recruitment::latest()->take($count)->get();
    }
}
