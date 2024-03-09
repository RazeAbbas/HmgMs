<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','company','office',
        'roles','cnic','phone','city','address','pay',
        'check_in','rest','cnic_front','cnic_back','police_verification', 
        'email', 'password','profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCompany(){
        return $this->belongsTo('App\Models\Company','company','id');
    }

    public function getOffice(){
        return $this->belongsTo('App\Models\Office','office','id');
    }

    public function myOffices(){
        return $this->hasMany('App\Models\Office','created_user');
    }
}
