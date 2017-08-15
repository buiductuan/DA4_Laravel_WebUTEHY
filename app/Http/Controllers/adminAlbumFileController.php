<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlbumFile;

class adminAlbumFileController extends Controller
{
    public function index()
    {
    	$albumfiles = AlbumFile::orderBy('id','desc')->get();
    	return view('admin.pages.albumFile.index',[
    		'albumfiles'=>$albumfiles
    	]);
    }

    public function postCreate(Request $req)
    {
    	$this->validate($req,[
    		'name'=>'required|max:250|min:3',
    	]);

    	$albumFile = new AlbumFile;

    	$albumFile->name = $req->name;

    	if($req->hasFile('img'))
    	{
    		$file = $req->file('img');
    		$name = $file->getClientOriginalName();

    		$link = str_random(20)."_".$name;

    		$file->move('admin_assets/upload/images/albumFile',$link);

    		$albumFile->image = $link;
    	}

    	$albumFile->alias = uri_friendly($req->name);
    	if($albumFile->orderBy > 0)
    	{
    		$albumFile->orderBy = $req->orderBy;
    	}
    	$albumFile->status = $req->rdStatus;

    	$albumFile->save();

    	return redirect('admin/albumfile');
    }

    public function store($id)
    {
    	$album = AlbumFile::find($id);
    	$albumfiles = AlbumFile::orderBy('id','desc')->get();
    	return view('admin.pages.albumFile.edit',[
    		'albumfiles'=>$albumfiles,
    		'album'=>$album,
    	]);
    }
    public function postStore(Request $req, $id)
    {
    	$this->validate($req,[
    		'name'=>'required|max:250|min:3',
    	]);

    	$albumFile = AlbumFile::find($id);

    	$albumFile->name = $req->name;

    	if($req->hasFile('img'))
    	{
    		$file = $req->file('img');
    		$name = $file->getClientOriginalName();

    		$link = str_random(20)."_".$name;

    		$file->move('admin_assets/upload/images/albumFile',$link);

    		$albumFile->image = $link;
    	}

    	$albumFile->alias = uri_friendly($req->name);
    	if($albumFile->orderBy > 0)
    	{
    		$albumFile->orderBy = $req->orderBy;
    	}
    	$albumFile->status = $req->rdStatus;

    	$albumFile->save();

    	return redirect('admin/albumfile');
    }

    public function destroy($id)
    {
    	$album = AlbumFile::find($id);
    	$album->delete();
    	return redirect('admin/albumfile');
    }
    public function destroy_multi($data)
    {
    	$arr_id = explode(",",$data);

    	foreach ($arr_id as $i) {
    		$this->destroy($i);
    	}
    }

    //ajax
    public function allid()
    {
    	$album = AlbumFile::all();

    	foreach($album as $item){
    		echo $item->id."#";
    	}
    }
}
