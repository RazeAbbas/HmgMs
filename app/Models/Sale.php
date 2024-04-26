<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        "customer_name","item_id","qty",
        "qty","price","total","total_bill",
        "discount","payable_amount"
    ];
    public function employees(){
        return $this->belongsTo('App\Models\Employe','employes','emp_id');
    }
}
