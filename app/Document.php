<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = "document";
    protected $fillable = [
    	'id','documentTypeID','name',
    	'link','created_at','updated_at'
    ];
}
