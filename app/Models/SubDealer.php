<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDealer extends Model
{
    protected $fillable = [
        'name','cnic','prefix','phone','address','office_id','company_id','created_user'
    ];

    public function getTransactions(){
        return $this->hasMany('App\Models\Transaction','subdealer_id');
    }
}
