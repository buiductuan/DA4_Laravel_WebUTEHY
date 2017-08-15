<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subject";
    protected $fillable = [
    	'id','name','image','desc','facultyID',
    	'created_at','updated_at'
    ];
}
