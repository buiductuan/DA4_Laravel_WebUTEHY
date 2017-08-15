<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty_trash extends Model
{
    protected $table = "faculty_trash";
    protected $fillable = [
    	'id','name','desc','phone','website',
    	'link','created_at','updated_at'
    ];
}
