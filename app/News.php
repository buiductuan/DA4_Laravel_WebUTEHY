<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
    	'id','cate_id','name','alias','image','desc','detail','meta_key','meta_desc',
    	'user_id','isDraft','isBrowse','isPublish','status','create_at','updated_at'
    ];
}
