<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;
use App\AlbumFile;

class adminFileController extends Controller
{
	public function index()
    {
    	$files = Files::orderBy('id','desc')->get();
        $albums = AlbumFile::orderBy('id','desc')->get();
    	return view('admin.pages.file.index',[
            'files'=>$files,
    		'albums'=>$albums,
    	]);
    }

    public function postCreate(Request $req)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|max:250|min:3',
    		'file'=>'required|max:10240'
    	]);

    	$files = new Files;
    	$files->albumID = $req->sl_album;
        $files->name = $req->name;
    	$files->alias = uri_friendly($req->name);
    	
    	if($req->hasFile('file'))
    	{
    		$file = $req->file('file');
    		$name = $file->getClientOriginalName();

    		$link = str_random(20)."_".$name;

    		$file->move('admin_assets/upload/files',$link);

    		$files->link = "admin_assets/upload/files/".$link;
    	}

    	$files->save();

    	return redirect('admin/file');
    
    }
    public function store($id)
    {
    	$doc = Files::find($id);
    	$fileTypes = fileType::all();

    	return view('admin.pages.file.edit',[
    		'doc'=>$doc,
    		'fileTypes'=>$fileTypes
    	]);
    }
    public function postStore(Request $req,$id)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|max:250|min:3',
    		'link'=>'max:10240'
    	]);

    	$file = file::find($id);

    	$file->fileTypeID = $req->sl_fileTypeID;
    	$file->name = $req->name;
    	
    	if($req->hasFile('link'))
    	{
    		$file = $req->file('link');
    		$name = $file->getClientOriginalName();

    		$link = str_random(20)."_".$name;

    		$file->move('admin_assets/upload/files',$link);

            File::delete($file->link);

    		$file->link = "admin_assets/upload/files/".$link;
    	}

    	$file->save();

    	return redirect('admin/file');
    }

    public function destroy($id)
    {
    	$files = Files::find($id);
    	File::delete($files->link);
    	$files->delete();
    	return redirect('admin/file');
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
        $files= Files::all();
        foreach($files as $f){
            echo $f->id."#";
        }
    } 
}
