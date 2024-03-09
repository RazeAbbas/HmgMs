<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'office_name',
        'office_phone',
        'office_address',
        'company_id',
        'created_at'
    ];

    public function getCompany() {
        return $this->belongsTo('App\Models\Company','company_id','id');
    }
    public function getDocuments(){
        return $this->hasMany('App\Models\Document','office_id');
    }
}
