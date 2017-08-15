<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\DocumentType;
use Illuminate\Support\Facades\File;

class adminDocumentController extends Controller
{
    public function index()
    {
    	$documents = Document::orderBy('id','desc')->get();

    	return view('admin.pages.document.index',[
    		'documents'=>$documents
    	]);
    }

    public function create()
    {
    	$documentTypes = DocumentType::all();
    	return view('admin.pages.document.create',[
    		'documentTypes'=>$documentTypes
    	]);
    }

    public function postCreate(Request $req)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|max:250|min:3',
    		'link'=>'required|max:10240'
    	]);

    	$document = new Document;
    	$document->documentTypeID = $req->sl_documentTypeID;
    	$document->name = $req->name;
    	
    	if($req->hasFile('link'))
    	{
    		$file = $req->file('link');
    		$name = $file->getClientOriginalName();

    		$link = str_random(20)."_".$name;

    		$file->move('admin_assets/upload/documents',$link);

    		$document->link = "admin_assets/upload/documents/".$link;
    	}

    	$document->save();

    	return redirect('admin/document');
    }

    public function store($id)
    {
    	$doc = Document::find($id);
    	$documentTypes = DocumentType::all();

    	return view('admin.pages.document.edit',[
    		'doc'=>$doc,
    		'documentTypes'=>$documentTypes
    	]);
    }
    public function postStore(Request $req,$id)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|max:250|min:3',
    		'link'=>'max:10240'
    	]);

    	$document = Document::find($id);

    	$document->documentTypeID = $req->sl_documentTypeID;
    	$document->name = $req->name;
    	
    	if($req->hasFile('link'))
    	{
    		$file = $req->file('link');
    		$name = $file->getClientOriginalName();

    		$link = str_random(20)."_".$name;

    		$file->move('admin_assets/upload/documents',$link);

            File::delete($document->link);

    		$document->link = "admin_assets/upload/documents/".$link;
    	}

    	$document->save();

    	return redirect('admin/document');
    }

    public function destroy($id)
    {
    	$doc = Document::find($id);
    	File::delete($doc->link);
    	$doc->delete();
    	return redirect('admin/document');
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
        $docs= Document::all();
        foreach($docs as $doc){
            echo $doc->id."#";
        }
    }
}
