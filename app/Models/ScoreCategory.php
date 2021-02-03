<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paginate($count = 10) 
    {
        return $this->orderBy('id', 'ASC')->paginate($count);
    }
}
