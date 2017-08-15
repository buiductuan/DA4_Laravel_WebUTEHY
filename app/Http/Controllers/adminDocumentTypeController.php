<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocumentType;
class adminDocumentTypeController extends Controller
{
    public function index()
    {
    	$documenttypes = DocumentType::orderBy('id','desc')->get();
    	return view('admin.pages.documenttype.index',[
    		'documenttypes'=>$documenttypes
    	]);
    }

    public function create()
    {
    	return view('admin.pages.documenttype.create');
    }

    public function postCreate(Request $req)
    {
    	$this->validate($req,[
    		'name'=>'required|max:250|min:3'
    	]);

    	$documenttype = new DocumentType;

    	$documenttype->name = $req->name;
    	$documenttype->alias = uri_friendly($req->name);
    	$documenttype->status = $req->rdStatus;

    	$documenttype->save();
    	return redirect('admin/documenttype');
    }

    public function store($id)
    {
    	$documenttype = DocumentType::find($id);
    	return view('admin.pages.documenttype.edit',[
    		'documenttype'=>$documenttype
    	]);
    }
    public function postStore(Request $req,$id)
    {
    	$this->validate($req,[
    		'name'=>'required|max:250|min:3'
    	]);

    	$documenttype = DocumentType::find($id);

    	$documenttype->name = $req->name;
    	$documenttype->alias = uri_friendly($req->name);
    	$documenttype->status = $req->rdStatus;

    	$documenttype->save();
    	
    	return redirect('admin/documenttype');

    }

    public function destroy($id)
    {
    	$documenttype = DocumentType::find($id);
    	$documenttype->delete();
    	return redirect('admin/documenttype');
    }

    public function destroy_multi($data)
    {
    	$arr_id = explode(",",$data);
    	foreach($arr_id as $i){
    		$this->destroy($i);
    	}
    }

    //ajax
    public function allid()
    {
    	$documenttypes = DocumentType::all();
    	foreach($documenttypes as $item){
    		echo $item->id."#";
    	}
    }
}
