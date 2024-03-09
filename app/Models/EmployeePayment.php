<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePayment extends Model
{
    protected $fillable = [
        'year','month','date','amount','note'
    ];

    public function getEmployee(){
        return $this->belongsTo('App\Models\Employe','employee_id','id');
    }

    
}
