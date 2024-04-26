<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
       'title','description','price','office_id','company_id','created_user'
    ];
    public function employees(){
        return $this->belongsTo('App\Models\Employe','employees','emp_id');
    }
}
