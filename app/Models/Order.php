<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name','phone','item','brand','item_code','amount_in','amount_status','total_bill',
        'pending_amount','advance_amount','transfer_account','date','title','remarks'
    ];
    public function getItem(){
        return $this->belongsTo("App\Models\Item","item","id");
    }
}
