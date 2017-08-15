<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sciencestudy;
class adminSciencestudyController extends Controller
{
    public function index()
    {
    	$sciencestudys = Sciencestudy::orderBy('id','desc')->get();
    	return view('admin.pages.sciencestudy.index',[
    		'sciencestudys'=>$sciencestudys
    	]); 
    }

    public function create()
    {
    	return view('admin.pages.sciencestudy.create');
    }

    public function postCreate(Request $req)
    {
    	$this->validate($req,
    	[	
    		'name'=>'required|max:250|min:3',
    		'author'=>'required|max:250|min:3',
    		'begin'=>'required|max:250|min:3',
    		'end'=>'required|max:250|min:3',
    	]);

    	$sciencestudy = new Sciencestudy;

    	$sciencestudy->sciencestudy_id = $req->sciencestudy_id;
    	$sciencestudy->level = $req->sl_level;
    	$sciencestudy->name = $req->name;
    	$sciencestudy->desc = $req->desc;
    	$sciencestudy->detail = $req->detail;
    	$sciencestudy->author = $req->author;
    	$sciencestudy->begin = $req->begin;
    	$sciencestudy->end = $req->end;
    	$sciencestudy->orderBy = $req->orderBy;
    	$sciencestudy->status = $req->rdStatus;

    	$sciencestudy->save();
    	return redirect('/admin/sciencestudy');
    }

    public function store($id)
    {
    	$sciencestudy = Sciencestudy::find($id);
    	return view('admin.pages.sciencestudy.edit',[
    		'sciencestudy'=>$sciencestudy
    	]);
    }

    public function postStore(Request $req,$id)
    {
    	$this->validate($req,
    	[	
    		'name'=>'required|max:250|min:3',
    		'author'=>'required|max:250|min:3',
    		'begin'=>'required|max:250|min:3',
    		'end'=>'required|max:250|min:3',
    	]);

    	$sciencestudy = Sciencestudy::find($id);

    	$sciencestudy->sciencestudy_id = $req->sciencestudy_id;
    	$sciencestudy->level = $req->sl_level;
    	$sciencestudy->name = $req->name;
    	$sciencestudy->desc = $req->desc;
    	$sciencestudy->detail = $req->detail;
    	$sciencestudy->author = $req->author;
    	$sciencestudy->begin = $req->begin;
    	$sciencestudy->end = $req->end;
    	$sciencestudy->orderBy = $req->orderBy;
    	$sciencestudy->status = $req->rdStatus;

    	$sciencestudy->save();
    	return redirect('/admin/sciencestudy');
    }

    public function destroy($id)
    {
    	$sciencestudy = Sciencestudy::find($id);
    	$sciencestudy->delete();
    	return redirect('admin/sciencestudy');
    }

    public function destroy_multi($data)
    {
    	$arr_id = explode(",",$data);
    	foreach($arr_id as $i){
    		$this->destroy($i);
    	}
    }
}
