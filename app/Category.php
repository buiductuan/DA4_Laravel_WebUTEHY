<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 	protected $fillable = [
 		'id','parentID','name','alias','image','desc','meta_key','meta_desc',
 		'user_id','status','isShowNav','isShowContent','created_at','updated_at'
 	];   
}
