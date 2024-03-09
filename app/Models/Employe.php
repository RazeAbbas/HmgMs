<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'first_name','last_name','company','office','roles','cnic','phone','city','address','pay','check_in','rest','cnic_front','cnic_back','police_verification', 'email', 'password','profile_image',
    ];

    public function getOffice() {
        return $this->belongsTo('App\Models\Office','office','id');
    }
    public function getCompany(){
        return $this->belongsTo('App\Models\Company','company','id');
    }

    // public function getEmployeePayments(){
    //     return $this->('App\Models\EmployeePayment','employee_id');
    // }
}
