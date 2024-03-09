<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    public function getSupplier(){
        return $this->belongsTo('App\Models\Supplier','supplier_id','id');
    }
}
