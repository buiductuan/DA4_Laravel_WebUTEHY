<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_trash extends Model
{
    protected $table = "employee_trash";

    protected $fillable = [
    	'id','facultyID','subjectID','orderBy',
    	'name','fullname','desc','image',
    	'dob','gender','address',
    	'email','mobilephone','homephone',
    	'fax','department','education',
    	'office','website','research_area','scientific_research',
    	'status','created_at','updated_at'
    ];
}
