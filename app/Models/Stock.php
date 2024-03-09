<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'item','brand','item','purchase_id','per_price','qty','date','battery','storage_area',
        'office_id','company_id','created_user'
    ];
    public function getItems(){
        return $this->belongsTo('App\Models\Item','item','id');
    }
    public function getBrands(){
        return $this->belongsTo('App\Models\Brand','brand','id');
    }
}
