<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dangky extends Model
{
   
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'dangky_id', 'khoahoc_id', 'customer_id','dangky_status'
    ];
     protected $table = 'tbl_dangky';
    protected $primarykey='dangky_id';
}
