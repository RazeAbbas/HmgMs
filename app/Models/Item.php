<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ["name","barcode","supplier","item_type","barnd","view","sale_price","purchase_price"];

    public function getSupplier() {
        return $this->belongsTo("App\Models\Supplier","supplier","id");
    }
    public function getItemType(){
        return $this->belongsTo("App\Models\ItemType","item_type","id");
    }
    public function getBrand(){
        return $this->belongsTo("App\Models\Brand","brand","id");
    }
    public function getStock(){
        return $this->belongsTo("App\Models\Stock","id","item");
    }
}
