<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        "date","bill_amount","received_amount","receipt_number",
        "description","item","code"
    ];

    public function getSubDealer(){
        return $this->belongsTo("App\Models\SubDealer","subdealer_id","id");
    }
    public function getItem(){
        return $this->belongsTo("App\Models\Item","item","id");
    }
}
