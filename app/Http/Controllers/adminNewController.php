<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\New_Trash;
use App\Category;
use App\Tag;
use App\New_tag;

class adminNewController extends Controller
{
    // Tạo mới tin tức
    public function create()
    {
    	$cate_new = Category::all();
    	return view('admin.pages.new.create',[
    			'categories'=>$cate_new
    	]);
    }

    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            "title"=>"required|max:200|min:10",
            "desc"=>"required|min:10",
            "detail"=>"required|min:10",
        ],
        [
            "title.required"=>"Please enter new title",
            "title.max"=>"Please enter new title small less 200 character",
            "title.min"=>"Please enter new title less than 10 character",

            "desc.required"=>"Please enter new description",
            "desc.min"=>"Please enter new description less than 10 character",


            "detail.required"=>"Please enter new detail",
            "detail.min"=>"Please enter new description less than 10 character",
        ]);

        $new  = new News;

        $new->name = $req->title;
        $new->desc = $req->desc;
        $new->detail = $req->detail;
        $new->alias = uri_friendly($req->title);
        $new->cate_id = $req->cate_id;
        $new->user_id = $req->user_id;

        if($req->hasFile('img_new'))
        {
            $file = $req->file('img_new');
            $name = $file->getClientOriginalName();

            $img = str_random(50)."_".$name;

            $file->move('client_assets/upload/images/new/',$img);
            $file->move('admin_assets/upload/images/new/',$img);

            $new->image = $img;
        }

        if($req->meta_key == "")
        {
            $new->meta_key = $req->title;
        }
        else
        {
            $new->meta_key = $req->meta_key;
        }
        if($req->meta_desc == "")
        {
            $new->meta_desc = $req->title;
        }
        else
        {
            $new->meta_desc = $req->meta_desc;
        }

        $new->status = $req->rdStatus;
        $new->tags = $req->tags;

        $new->save();

        if($req->tags !="")
        {
            $arr_tag = explode(",",$req->tags);

            for($i = 0 ; $i < count($arr_tag) ; $i++)
            {
                $get_tag = Tag::where('tag_id',uri_friendly(trim($arr_tag[$i])))->get();
                if(count($get_tag) > 0)
                {
                    $new_tag = new New_tag;
                    $new_tag->tag_id = uri_friendly(trim($arr_tag[$i]));
                    $new_tag->new_id = $new->id;

                    $new_tag->save();
                }
                else
                {
                    $tag = new Tag;
                    $tag->tag_id = uri_friendly(trim($arr_tag[$i]));
                    $tag->name = $arr_tag[$i];

                    $new_tag = new New_tag;
                    $new_tag->tag_id = uri_friendly(trim($arr_tag[$i]));
                    $new_tag->new_id = $new->id;

                    $tag->save();
                    $new_tag->save();
                }
            }
        }

        return redirect('/admin/new/browse');
    }

    // Tin chờ duyệt
    public function browse()
    {
        $categories = Category::all();
        $news_browse = News::orderBy('id','desc')
                            ->where('isBrowse',1)
                            ->where('isDraft',0)
                            ->where('isPublish',0)->paginate(10);
        return view('admin.pages.new.browse',[
            'new_br_list'=>$news_browse,
            'categories'=>$categories
        ]);
    }
    public function browse_actived($id)
    {
        $new = News::find($id);
        $new->isBrowse = 0;
        $new->isPublish = 1;
        $new->save();
    }
    public function browse_multi_actived($data)
    {
        $arr_id = explode(",",$data);
        for($i = 0 ;$i < count($arr_id);$i++){
            $this->browse_actived($arr_id[$i]);
        }
        // print_r($arr_id);
    }

    // Tin chờ xuất bản
    public function publish()
    {
         $categories = Category::all();
         $news_publish = News::where('isPublish',1)
                            ->where('isDraft',0)
                            ->where('isBrowse',0)->paginate(10);
        return view('admin.pages.new.publish',[
            'new_pl_list'=>$news_publish,
            'categories'=>$categories
        ]);
    }
    public function publish_actived($id)
    {
        $new = News::find($id);
        $new->isBrowse = 0;
        $new->isPublish = 0;
        $new->save();
    }
    public function publish_multi_actived($data)
    {
        $arr_id = explode(",",$data);
        for($i = 0 ; $i < count($arr_id) ; $i++)
        {
            $this->publish_actived($arr_id[$i]);
        }
    }

    // Tin đã xuất bản
    public function published()
    {
        $categories = Category::all();
        $new_published_list = News::orderBy('id','desc')
                                    ->where('isDraft',0)
                                    ->where('isBrowse',0)
                                    ->where('isPublish',0)
                                    ->paginate(10);
        return view('admin.pages.new.published',[
            'new_published_list'=>$new_published_list,
            'categories'=>$categories
        ]);
    }

    //Cập nhật tin tức
    public function store($id)
    {
        $new = News::find($id);
        $categories = Category::all();
        return view('admin.pages.new.update',['new'=>$new,'categories'=>$categories]);
    }

    public function postStore(Request $req,$id)
    {
        
         $this->validate($req,
        [
            "title"=>"required|max:200|min:10",
            "desc"=>"required|min:10",
            "detail"=>"required|min:10",
        ],
        [
            "title.required"=>"Please enter new title",
            "title.max"=>"Please enter new title small less 200 character",
            "title.min"=>"Please enter new title less than 10 character",

            "desc.required"=>"Please enter new description",
            "desc.min"=>"Please enter new description less than 10 character",


            "detail.required"=>"Please enter new detail",
            "detail.min"=>"Please enter new description less than 10 character",
        ]);

        $new = News::find($id);
        
        $new->name = $req->title;
        $new->desc = $req->desc;
        $new->detail = $req->detail;
        $new->alias = uri_friendly($req->title);
        $new->cate_id = $req->cate_id;
        $new->user_id = $req->user_id;

        if($req->hasFile('img_new'))
        {
            $file = $req->file('img_new');
            $name = $file->getClientOriginalName();

            $img = str_random(50)."_".$name;

            $file->move('client_assets/upload/images/new/',$img);
            $file->move('admin_assets/upload/images/new/',$img);

            $new->image = $img;
        } 

        $new->status = $req->rdStatus;
        $new->isDraft = 0;
        $new->isBrowse = 1;
        $new->tags = $req->tags;

        $new->save();

        
        if($req->tags !="")
        {
            $arr_tag = explode(",",$req->tags);

            for($i = 0 ; $i < count($arr_tag) ; $i++)
            {
                $get_tag = Tag::where('tag_id',uri_friendly(trim($arr_tag[$i])))->get();
                if(count($get_tag) > 0)
                {
                    $new_tag = new New_tag;
                    $new_tag->tag_id = uri_friendly(trim($arr_tag[$i]));
                    $new_tag->new_id = $new->id;

                    $new_tag->save();
                }
                else
                {
                    $tag = new Tag;
                    $tag->tag_id = uri_friendly(trim($arr_tag[$i]));
                    $tag->name = $arr_tag[$i];

                    $new_tag = new New_tag;
                    $new_tag->tag_id = uri_friendly(trim($arr_tag[$i]));
                    $new_tag->new_id = $new->id;

                    $tag->save();
                    $new_tag->save();
                }
            }
        }


        return redirect('/admin/new/browse');
    }

    // Tin đang soạn
    public function draft()
    {
        $list_draft_new = News::where('isDraft',1)->get();
        $cate_new = Category::all();    
        return view('admin.pages.new.draft',[
            'draft_list'=>$list_draft_new,
            'categories'=>$cate_new
        ]);
    }
    public function postDraft(Request $req)
    {
        $new = new News;
        $new->name = $req->title;
        $new->cate_id = $req->cate_id;
        $new->user_id = $req->user_id;
        $new->isDraft = 1;
        $new->isBrowse = 0;
        $new->isPublish = 0;
        $new->save();
        return redirect('/admin/new/draft');
    }
    public function Draft_moveToTrash($id)
    {
        $new = News::find($id);
        
        $new_trash = new New_Trash;
        $new_trash->id = $new->id;
        $new_trash->cate_id = $new->cate_id;
        $new_trash->name = $new->name;
        $new_trash->image = $new->image;
        $new_trash->desc = $new->desc;
        $new_trash->detail = $new->detail;
        $new_trash->meta_key = $new->meta_key;
        $new_trash->meta_desc = $new->meta_desc;
        $new_trash->user_id = $new->user_id;
        $new_trash->isDraft = $new->isDraft;
        $new_trash->isBrowse = $new->isBrowse;
        $new_trash->isPublish = $new->isPublish;
        $new_trash->status = $new->status;
        $new_trash->created_at = $new->created_at;
        $new_trash->updated_at = $new->updated_at;
        
        $new_trash->save();
        
        $new->delete();


        return redirect('admin/new/draft');
    }

    public function moveToTrash($id)
    {
        $new = News::find($id);
        
        $new_trash = new New_Trash;
        $new_trash->id = $new->id;
        $new_trash->cate_id = $new->cate_id;
        $new_trash->name = $new->name;
        $new_trash->image = $new->image;
        $new_trash->desc = $new->desc;
        $new_trash->detail = $new->detail;
        $new_trash->meta_key = $new->meta_key;
        $new_trash->meta_desc = $new->meta_desc;
        $new_trash->user_id = $new->user_id;
        $new_trash->isDraft = $new->isDraft;
        $new_trash->isBrowse = $new->isBrowse;
        $new_trash->isPublish = $new->isPublish;
        $new_trash->status = $new->status;
        $new_trash->created_at = $new->created_at;
        $new_trash->updated_at = $new->updated_at;
        
        $new_trash->save();
        
        $new->delete();

        return redirect()->back();

    }

    public function moveToTrash_multi($data)
    {
        try{
            $arr_id = explode(",",$data);
            for($i =0 ;$i < count($arr_id);$i++)
            {
               $this->moveToTrash($arr_id[$i]);
            }
            return true;
        }
        catch(\Exception $e){
                return false;
        }
    }

    // Tin đã xóa
    public function trash()
    {
        $trashes = New_Trash::all();
        $categories = Category::all();
        return view('admin.pages.new.trash',[
            'trash_list'=>$trashes,
            'categories'=>$categories,
        ]);
    }
    public function permanentlyDelete($id)
    {
        $new = New_Trash::find($id);

        $new->delete();

        return redirect('/admin/new/trash');
    }
    public function permanentlyDelete_multi($data)
    {
        $arr_id = explode(",",$data);
        for($i = 0; $i< count($arr_id) ; $i++){
            $this->permanentlyDelete($arr_id[$i]);
        }
    }

    public function search()
    {
        $categories = Category::where('status',1)->get();
        $result_search = [];
        $keyword = "";
        $rdSearch = 0;
        return view('admin.pages.new.search',[
            'categories'=>$categories,
            'result_search'=>$result_search,
            'keyword'=>$keyword,
            'rdSearch'=>$rdSearch
        ]);
    }

    public function postSearch(Request $req)
    {
        if($req->rdSearch > 0)
        {
            $rdSearch = $req->rdSearch;
            $keyword = $req->keyword;
            $result_search = News::where('name','LIKE','%'.$req->keyword.'%')->get();
            return view('admin.pages.new.search',[
                'result_search'=>$result_search,
                'rdSearch'=>$rdSearch,
                'keyword'=>$keyword
            ]);
        }
        else
        {
            $rdSearch = $req->rdSearch;
            $keyword = $req->keyword;
            $result_search = News::find($req->keyword);
            return view('admin.pages.new.search',[
                'result_search'=>$result_search,
                'rdSearch'=>$rdSearch,
                'keyword'=>$keyword
            ]);
        }
    }
}
