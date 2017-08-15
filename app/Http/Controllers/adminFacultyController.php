<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\Faculty_trash;

class adminFacultyController extends Controller
{
    public function index()
    {
    	$faculties = Faculty::orderBy('created_at','desc')->get();
    	return view('admin.pages.faculty.index',[
    		'faculties'=>$faculties
    	]);
    }

    public function create()
    {
    	return view('admin.pages.faculty.create');
    }

    public function postCreate(Request $req)
    {
    	$this->validate($req,
    	[
    		'facultyID'=>'required|max:10|min:2',
    		'facultyName'=>'required|max:50|min:3'
    	],
    	[
    		'facultyID.required'=>'Mã khoa không được trống.',
    		'facultyID.max'=>'Mã khoa không vượt quá 10 ký tự.',
    		'facultyID.min'=>'Mã khoa phải lớn hơn 2 ký tự.'
    	]);

    	$faculty = new Faculty;

        $faculty->id = $req->facultyID;
        $faculty->name = $req->facultyName;
        $faculty->desc = $req->facultyDesc;
        $faculty->phone = $req->phone;
        $faculty->website = $req->website;
        $faculty->link = $req->link;

        $faculty->save();

        return redirect('admin/faculty');
    }

    public function store($id)
    {
        $faculty = Faculty::find($id);

        return view('admin.pages.faculty.edit',[
            'faculty'=>$faculty
        ]);
    }

    public function postStore(Request $req,$id)
    {
        $this->validate($req,
        [
            'facultyID'=>'required|max:10|min:2',
            'facultyName'=>'required|max:50|min:3'
        ],
        [
            'facultyID.required'=>'Mã khoa không được trống.',
            'facultyID.max'=>'Mã khoa không vượt quá 10 ký tự.',
            'facultyID.min'=>'Mã khoa phải lớn hơn 2 ký tự.'
        ]);

        $faculty = Faculty::find($id);

        $faculty->name = $req->facultyName;
        $faculty->desc = $req->facultyDesc;
        $faculty->phone = $req->phone;
        $faculty->website = $req->website;
        $faculty->link = $req->link;

        $faculty->save();

        return redirect('admin/faculty');
    }

    public function moveToTrash($id)
    {
        $faculty = Faculty::find($id);

        $faculty_trash = new Faculty_trash;

        $faculty_trash->id = $faculty->id;
        $faculty_trash->name = $faculty->name;
        $faculty_trash->desc = $faculty->desc;
        $faculty_trash->phone = $faculty->phone;
        $faculty_trash->website = $faculty->website;
        $faculty_trash->link = $faculty->link;

        $faculty->delete();
        $faculty_trash->save();

        return redirect('admin/faculty');
    }
    public function moveToTrash_multi($data)
    {
        $arr_id = explode(",",$data);
        for($i = 0; $i < count($arr_id); $i++)
        {
            $this->moveToTrash($arr_id[$i]);
        }
    }

    public function trash()
    {
        $faculties_trash = Faculty_trash::orderBy('created_at','desc')->get();

        return view('admin.pages.faculty.trash',[
            'faculties_trash'=>$faculties_trash
        ]);
    }

    public function destroy($id)
    {
        $faculty = Faculty_trash::find($id);
        $faculty->delete();
        return redirect('admin/faculty/trash');
    }
    public function destroy_multi($data)
    {
        $arr_id = explode(",",$data);
        for($i = 0; $i < count($arr_id); $i++)
        {
            $this->destroy($arr_id[$i]);
        }
    }
}
