<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
	protected $primaryKey = 'cat_id';
	public $timestamps = true;
	protected $fillable = ['label','description'];
	public static function boot()
    {
        parent::boot();
    }
}
