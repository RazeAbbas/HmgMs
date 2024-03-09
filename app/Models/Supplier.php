<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        "name","phone","bank","account","city","address","address"
    ];

    public function getBank(){
        return $this->belongsTo("App\Models\Bank","bank_id","id");
    }
}
