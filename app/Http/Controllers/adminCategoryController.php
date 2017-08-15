<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Category_Trash;

class adminCategoryController extends Controller
{
   public function index()
   {
   		$categories = Category::orderBy('parentID','asc')->paginate(10);
   		return view('admin.pages.category.index',['category_list'=>$categories]);
   }

   public function create()
   {
   		$cateParents = Category::orderBy('parentID','asc')->where('status',1)->get();
   		return view('admin.pages.category.create',[
   			'cateParents'=>$cateParents
   		]);
   }

   public function postCreate(Request $req)
   {
   	$this->validate($req,
   	[
   		"cateName"=>'required|max:250|min:5'
   	],
   	[
   		"cateName.required"=>"Tên chuyên mục không được trống. Vui lòng điền tên chuyên mục.",
   		"cateName.max"=>"Tên chuyên mục chỉ chứa tối đa là 250 ký tự.",
   		"cateName.min"=>"Tên chuyên mục chỉ chứa ít nhất là 5 ký tự.",
   	]);

   	$cate = new Category;

   	$cate->name = $req->cateName;
   	
   	if($req->cate_parent > 0)
   	{
   		$cate->parentID = $req->cate_parent;
   	}
   	
   	$cate->alias = uri_friendly($req->cateName);
   	
   	if($req->cateDesc != "")
   	{
   		$cate->desc = $req->cateDesc;
   	}
   	else
   	{
   		$cate->desc = $req->cateName;
   	}

   	if($req->meta_key != "")
   	{
   		$cate->meta_key = $req->meta_key;
   	}
   	else
   	{
   		$cate->meta_key = $req->cateName;
   	}

   if($req->meta_desc != "")
   	{
   		$cate->meta_desc = $req->meta_desc;
   	}
   	else
   	{
   		$cate->meta_desc = $req->cateName;
   	}

   	if($req->hasFile('img_category'))
   	{
   		$file = $req->File('img_category');
   		$name = $file->getClientOriginalName();

   		$img = str_random(50)."_".$name;

   		$file->move('admin_assets/upload/images/category/',$img);

   		$cate->image = $img;
   	}

   	$cate->status = $req->rdStatus;
      $cate->isShowNav = $req->rdShowNav;
      $cate->isShowContent = $req->rdShowContent;
   	$cate->user_id = $req->user_id;

   	$cate->save();

   	return redirect('/admin/category');
   }

   public function trash()
   {
      $category_list_trash = Category_Trash::orderBy('id','desc')->get();
      return view('admin.pages.category.trash',[
         'category_list_trash'=>$category_list_trash
      ]);
   }

   public function moveToTrash($id)
   {
		$cate = Category::find($id);
      
      $cate_all = Category::where('parentID',$id)->get();

      if(count($cate_all) > 0){
         for($i=0; $i < count($cate_all);$i++)
         {
            $cate_trash = new Category_Trash;
            $cate_trash->id = $cate_all[$i]->id;
            $cate_trash->name = $cate_all[$i]->name;
            $cate_trash->alias = $cate_all[$i]->alias;
            $cate_trash->desc = $cate_all[$i]->desc;
            $cate_trash->image = $cate_all[$i]->image;
            $cate_trash->meta_key = $cate_all[$i]->meta_key;
            $cate_trash->meta_desc = $cate_all[$i]->meta_desc;
            $cate_trash->user_id = $cate_all[$i]->user_id;
            $cate_trash->status = $cate_all[$i]->status;
            $cate_trash->save();
            $cate_all[$i]->delete();
         }
         $cate_trash  = new Category_Trash;

         $cate_trash->id = $cate->id;
         $cate_trash->name = $cate->name;
         $cate_trash->alias = $cate->alias;
         $cate_trash->desc = $cate->desc;
         $cate_trash->image = $cate->image;
         $cate_trash->meta_key = $cate->meta_key;
         $cate_trash->meta_desc = $cate->meta_desc;
         $cate_trash->user_id = $cate->user_id;
         $cate_trash->status = $cate->status;

         $cate_trash->save();
         $cate->delete();
      }
      else
      {
         $cate_trash  = new Category_Trash;

         $cate_trash->id = $cate->id;
         $cate_trash->name = $cate->name;
         $cate_trash->alias = $cate->alias;
         $cate_trash->desc = $cate->desc;
         $cate_trash->image = $cate->image;
         $cate_trash->meta_key = $cate->meta_key;
         $cate_trash->meta_desc = $cate->meta_desc;
         $cate_trash->user_id = $cate->user_id;
         $cate_trash->status = $cate->status;

         $cate_trash->save();
         $cate->delete();

      }

		return redirect('/admin/category');
   }
   public function moveToTrashMulti($data)
   {
      $arr_id = explode(",",$data);

      for($i=0;$i<count($arr_id);$i++){
         $this->moveToTrash($arr_id[$i]);
      }
   }

   public function Delete($id)
   {
      $cate = Category_Trash::find($id);

      $cate->delete();

      return redirect('/admin/category/trash');
   }

   public function DeleteMulti($data)
   {
      $arr_id = explode(",",$data);

      for($i=0;$i<count($arr_id);$i++){
         $this->Delete($arr_id[$i]);
      }
   }

   public function store($id)
   {
      $cateParents = Category::where('status',1)->get();
      $cate = Category::find($id);
      return view('admin.pages.category.edit',[
         'category'=>$cate,
         'cateParents'=>$cateParents,
      ]);
   }

   public function postStore(Request $req,$id)
   {
      $this->validate($req,
      [
         "cateName"=>'required|max:250|min:5'
      ],
      [
         "cateName.required"=>"Tên chuyên mục không được trống. Vui lòng điền tên chuyên mục.",
         "cateName.max"=>"Tên chuyên mục chỉ chứa tối đa là 250 ký tự.",
         "cateName.min"=>"Tên chuyên mục chỉ chứa ít nhất là 5 ký tự.",
      ]);

      $cate = Category::find($id);
      
      $cate->name = $req->cateName;
      
      if($req->cate_parent > 0)
      {
         $cate->parentID = $req->cate_parent;
      }
      
      $cate->alias = uri_friendly($req->cateName);
      
      if($req->cateDesc != "")
      {
         $cate->desc = $req->cateDesc;
      }
      else
      {
         $cate->desc = $req->cateName;
      }

      if($req->meta_key != "")
      {
         $cate->meta_key = $req->meta_key;
      }
      else
      {
         $cate->meta_key = $req->cateName;
      }

      if($req->meta_desc != "")
      {
         $cate->meta_desc = $req->meta_desc;
      }
      else
      {
         $cate->meta_desc = $req->cateName;
      }

      if($req->hasFile('img_category'))
      {
         $file = $req->File('img_category');
         $name = $file->getClientOriginalName();

         $img = str_random(50)."_".$name;

         $file->move('admin_assets/upload/images/category/',$img);

         $cate->image = $img;
      }

      $cate->status = $req->rdStatus;
      $cate->isShowNav = $req->rdShowNav;
      $cate->isShowContent = $req->rdShowContent;
      $cate->user_id = $req->user_id;

      $cate->save();

      return redirect('/admin/category');
   }
}
