<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_trash extends Model
{
    protected $table = "subject_trash";
    protected $fillable = [
    	'id','name','image','desc','facultyID',
    	'created_at','updated_at'
    ];
}
