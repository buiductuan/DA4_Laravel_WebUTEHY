<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Subject_trash;
use App\Faculty;
class adminSubjectController extends Controller
{
    public function index()
    {
    	$subjects = Subject::orderBy('created_at','desc')->get();
    	return view('admin.pages.subject.index',[
    		'subjects'=>$subjects
    	]);
    }

    public function create()
    {
    	$faculties = Faculty::orderBy('id','desc')->get();
    	return view('admin.pages.subject.create',[
    		'faculties'=>$faculties
		]);
    }
    public function postCreate(Request $req)
    {
    	$this->validate($req,
    	[
    		'subjectName'=>'required|max:250|min:3'
    	]);

    	$subject = new Subject;

    	$subject->name = $req->subjectName;
    	$subject->desc = $req->subjectDesc;
    	$subject->facultyID = $req->sl_faculty;

    	$subject->save();

    	return redirect('admin/subject');
    }

    public function store($id)
    {
    	$subject = Subject::find($id);
    	$faculties = Faculty::orderBy('id','desc')->get();
    	return view('admin.pages.subject.edit',[
    		'subject'=>$subject,
    		'faculties'=>$faculties
    	]);
    }
    public function postStore(Request $req , $id)
    {
    	$this->validate($req,
    	[
    		'subjectName'=>'required|max:250|min:3'
    	]);

    	$subject = Subject::find($id);

    	$subject->name = $req->subjectName;
    	$subject->desc = $req->subjectDesc;
    	$subject->facultyID = $req->sl_faculty;

    	$subject->save();

    	return redirect('admin/subject');
    }

    public function trash()
    {
    	$subjects_trash = Subject_trash::orderBy('created_at','desc')->get();
     	return view('admin.pages.subject.trash',[
    		'subjects_trash'=>$subjects_trash
    	]);
    }
    public function moveToTrash($id)
    {
    	$subject = Subject::find($id);
    	$subject_trash = new Subject_trash;

    	$subject_trash->id = $subject->id;
    	$subject_trash->name = $subject->name;
    	$subject_trash->desc = $subject->desc;
    	$subject_trash->image = $subject->image;
    	$subject_trash->facultyID = $subject->facultyID;

    	$subject->delete();
    	$subject_trash->save();

    	return redirect('admin/subject');
    }
    public function moveToTrash_multi($data)
    {
    	$arr_id= explode(",",$data);
    	foreach ($arr_id as $item) {
    		$this->moveToTrash($item);
    	}
    }
    public function destroy($id)
    {
    	$subject = Subject_trash::find($id);
    	$subject->delete();
    	return redirect()->back();
    }
     public function destroy_multi($data)
    {
    	$arr_id = explode(",",$data);
    	foreach ($arr_id as $item) {
    		$this->destroy($item);
    	}
    }
}
