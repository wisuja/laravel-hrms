<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() 
    {
        return $this->belongsTo(Role::class);
    }

    public function employee () 
    {
        return $this->hasOne(Employee::class);
    }

    public function paginate($count = 10) 
    {
        return $this->with('role')->latest()->paginate($count);
    }

    public function getProfile() 
    {
        return $this->with('employee')->where('id', auth()->id())->first();
    }

    public function isAdmin() 
    {
        return $this->role->isAdmin();
    }
}
