<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = "document_type";
    protected $fillable = [
    	'id','name','alias','created_at','updated_at'
    ];
}
