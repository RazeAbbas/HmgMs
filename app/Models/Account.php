<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        "holder_name",
        "account_title",
        "bank_id",
        "account_number"
    ];

    public function getBank() {
        return $this->belongsTo('App\Models\Bank','bank_id','id');
    }
}
