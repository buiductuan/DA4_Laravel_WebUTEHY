<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = [
    	'tag_id','name','created_at','updated_at'
    ];
}
