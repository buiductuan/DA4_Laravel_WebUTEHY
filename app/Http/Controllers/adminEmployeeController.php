<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Employee_trash;
use App\Faculty;
use App\Subject;

class adminEmployeeController extends Controller
{
    public function index()
    {
    	$employees = Employee::orderBy('orderBy','desc')->get();
    	return view('admin.pages.employee.index',[
    		'employees'=>$employees
    	]);
    }

    public function create()
    {
    	$faculties = Faculty::all();
    	return view('admin.pages.employee.create',[
    		'faculties'=>$faculties,
		]);
    }
    public function postCreate(Request $req)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|max:250|min:3',
    		'fullname'=>'required|max:250|min:3',
    		'email'=>'required|max:250|min:3',
    		'education'=>'required|max:250|min:3',
    	]);

    	$employee = new Employee;

    	$employee->name = $req->name;
    	$employee->facultyID = $req->sl_faculty;
    	$employee->subjectID = $req->sl_subject;
    	$employee->orderBy = $req->orderBy;
    	$employee->fullname = $req->fullname;
    	$employee->desc = $req->desc;
    	
    	if($req->hasFile("img"))
    	{
    		$file = $req->file('img');
    		$name = $file->getClientOriginalName();

    		$img = str_radom(50)."_".$name;
    		$file->move('admin_assets/upload/images/employee/'+$img);
    		$employee->image = $img;
    	}

    	$employee->dob = $req->dob;
    	$employee->gender = $req->rdGender;
    	$employee->address = $req->address;
    	$employee->email = $req->email;
    	$employee->mobilephone = $req->mobilephone;
    	$employee->homephone = $req->homephone;
    	$employee->fax = $req->fax;
    	$employee->department = $req->department;
    	$employee->education = $req->education;
    	$employee->office = $req->office;
    	$employee->website = $req->website;
    	$employee->room_work = $req->room_work;
    	$employee->research_area = $req->research_area;
    	$employee->scientific_research = $req->scientific_research;
    	$employee->status = $req->rdStatus;
    	$employee->link = $req->link;
    	$employee->orderBy = $req->orderBy;
    	

    	$employee->save();

    	return redirect('admin/employee');
    }

    public function store($id)
    {
    	$employee = Employee::find($id);
    	$faculties = Faculty::orderBy('id','desc')->get();
    	return view('admin.pages.employee.edit',[
    		'employee'=>$employee,
    		'faculties'=>$faculties,
    	]);
    }
    public function postStore(Request $req , $id)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|max:250|min:3',
    		'fullname'=>'required|max:250|min:3',
    		'email'=>'required|max:250|min:3',
    		'education'=>'required|max:250|min:3',
    	]);

    	$employee = Employee::find($id);

    	$employee->name = $req->name;
    	$employee->facultyID = $req->sl_faculty;
    	$employee->subjectID = $req->sl_subject;
    	$employee->orderBy = $req->orderBy;
    	$employee->fullname = $req->fullname;
    	$employee->desc = $req->desc;
    	
    	if($req->hasFile("img"))
    	{
    		$file = $req->file('img');
    		$name = $file->getClientOriginalName();

    		$img = str_random(50)."_".$name;
    		$file->move('admin_assets/upload/images/employee/',$img);
    		$employee->image = $img;
    	}

    	$employee->dob = $req->dob;
    	$employee->gender = $req->rdGender;
    	$employee->address = $req->address;
    	$employee->email = $req->email;
    	$employee->mobilephone = $req->mobilephone;
    	$employee->homephone = $req->homephone;
    	$employee->fax = $req->fax;
    	$employee->department = $req->department;
    	$employee->education = $req->education;
    	$employee->office = $req->office;
    	$employee->website = $req->website;
    	$employee->room_work = $req->room_work;
    	$employee->research_area = $req->research_area;
    	$employee->scientific_research = $req->scientific_research;
    	$employee->status = $req->rdStatus;
    	$employee->link = $req->link;
    	$employee->orderBy = $req->orderBy;
    	$employee->updated_at = date('Y-m-d H:i:s');
    	

    	$employee->save();

    	return redirect('admin/employee');
    }

    public function trash()
    {
    	$employees_trash = Employee_trash::orderBy('created_at','desc')->get();
     	return view('admin.pages.employee.trash',[
    		'employees_trash'=>$employees_trash
    	]);
    }
    public function moveToTrash($id)
    {
    	$employee = Employee::find($id);
    	$employee_trash = new Employee_trash;

    	$employee_trash->id = $id;
    	$employee_trash->name = $employee->name;
    	$employee_trash->facultyID = $employee->facultyID;
    	$employee_trash->subjectID = $employee->subjectID;
    	$employee_trash->orderBy = $employee->orderBy;
    	$employee_trash->fullname = $employee->fullname;
    	$employee_trash->desc = $employee->desc;
    	$employee_trash->image=$employee->image;
    	$employee_trash->dob = $employee->dob;
    	$employee_trash->gender = $employee->gender;
    	$employee_trash->address = $employee->address;
    	$employee_trash->email = $employee->email;
    	$employee_trash->mobilephone = $employee->mobilephone;
    	$employee_trash->homephone = $employee->homephone;
    	$employee_trash->fax = $employee->fax;
    	$employee_trash->department = $employee->department;
    	$employee_trash->education = $employee->education;
    	$employee_trash->office = $employee->office;
    	$employee_trash->website = $employee->website;
    	$employee_trash->room_work = $employee->room_work;
    	$employee_trash->research_area = $employee->research_area;
    	$employee_trash->scientific_research = $employee->scientific_research;
    	$employee_trash->status = $employee->status;
    	$employee_trash->link = $employee->link;
    	$employee_trash->orderBy = $employee->orderBy;    	


    	$employee->delete();
    	$employee_trash->save();

    	return redirect('admin/employee');
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
    	$employee = Employee_trash::find($id);
    	$employee->delete();
    	return redirect()->back();
    }
     public function destroy_multi($data)
    {
    	$arr_id = explode(",",$data);
    	foreach ($arr_id as $item) {
    		$this->destroy($item);
    	}
    }

    // ajax
    public function getSubject($facultyID)
    {
    	$subjects = Subject::where('facultyID',$facultyID)->get();

    	foreach ($subjects as $item) {
    		echo "<option value=\"$item->id\">".$item->name."</option>";
    	}
    }
}
