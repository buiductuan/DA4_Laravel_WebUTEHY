<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = "file";
    protected $fillable = [
    	'id','albumID','name','alias',
    	'link','status','created_at','updated_at'
    ];
}
