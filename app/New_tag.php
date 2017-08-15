<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_tag extends Model
{
    protected $table = "new_tags";

    protected $fillable = [
    	'tag_id','new_id'
    ];
}
