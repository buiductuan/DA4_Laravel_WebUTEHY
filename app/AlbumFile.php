<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumFile extends Model
{
    protected $table = "album_file";
    protected $fillable = [
    	'id','orderBy','name','alias',
    	'image','status','created_at','update_at'
    ];
}
