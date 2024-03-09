<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        "date","name","amount","image","description"
    ];

    public function getExpenseType() {
        return $this->belongsTo('App\Models\ExpenseType','name','id');
    }
}
