<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Trash extends Model
{
    protected $table = "categories_trash";
    protected $fillable = [
    	'id','parentID','name','alias','image','desc','meta_key','meta_desc',
 		'user_id','status','isShowNav','isShowContent','created_at','updated_at'
    ];
}
