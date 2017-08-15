<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sciencestudy extends Model
{
    protected $table="sciencestudy";
    protected $fillable = [
    	'id','level','orderBy','sciencestudy_id','name','desc'
    	,'detail','author','begin','end','status','created_at',
    	'updated_at'
    ];
}
