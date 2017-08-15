<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = "faculty";
    protected $fillable = [
    	'id','name','desc','phone','website',
    	'link','created_at','updated_at'
    ];
}
