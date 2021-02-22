<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admin() 
    {
        return $this->hasOne(Admin::class);
    }

    public function paginate($count = 10) {
        return $this->latest()->paginate($count);
    }

    public function isAdmin() {
        return $this->admin()->whereRoleId($this->id)->count() == 1;
    }
}
