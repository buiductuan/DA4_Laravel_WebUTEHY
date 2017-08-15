<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_Trash extends Model
{
	protected $table = 'new_trashes';
    protected $fillable = [
    	'id','cate_id','name','image','desc','detail','meta_key','meta_desc',
    	'user_id','isDraft','isBrowse','isPublish','status','create_at','updated_at'
    ];
}
