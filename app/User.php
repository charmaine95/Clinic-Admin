<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clinic_name', 'address', 'contact_no', 'username', 'email', 'password', 'reset_token', 'device_token','barangay_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function barangay()
    {
        return $this->belongsTo('App\Barangay', 'barangay_id');
    }

    public function pet()
    {
        return $this->hasMany('App\Pet');
    }
}
