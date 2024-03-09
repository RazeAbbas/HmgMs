<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier','title','order_date','receive_date','status','total_bill','advance_payment','purchase_receipt_image','cargo_service','bilter_number','cargo_service_number','description'
    ];

    public function getSupplier(){
        return $this->belongsTo('App\Models\Supplier','supplier','id');
    }

    public function getStock(){
        return $this->hasMany('App\Models\Stock','purchase_id');
    }
}
