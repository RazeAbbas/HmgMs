<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table       =   'attendance';
	protected $primaryKey  =   'att_id';
	public $timestamps     =   true;
	protected $fillable    =   ['emp_id','status','attendance_date','created_user','com_id','off_id'];
	public function user(){
        return $this->belongsTo('App\User','emp_id');
    }
    public static function boot()
    {
        parent::boot();
        $com_id =  \Auth::user()->com_id;
        static::addGlobalScope(function ($query) use($com_id) {
            $query->where('com_id', $com_id);
            $role =  \Auth::user()->role;
            $off_id =  \Auth::user()->off_id;
            if($role > 1)
                $query->where('off_id', $off_id);
        });
    }
}
