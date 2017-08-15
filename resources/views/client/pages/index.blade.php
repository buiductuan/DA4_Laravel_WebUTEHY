@extends('client.layouts.master')

@section('title')
  Website thông tin Trường Đại Học Sư Phạm Kỹ Thuật Hưng Yên
@endsection

@section('content')
<div class="news">
 <div>
    <h3 class="header"><span id="module152"><a href="#">TIN MỚI NHẤT</a></span></h3>
    <div class="content">
       <div style="width: 100%;" id="nsp-nsp_152" class="nspMain nspFs100 activated">
          <div style="width: 52%;" class="nspArts right">
             <div class="nspArtScroll1" style="width: 350px; overflow: hidden;">
                <div class="nspArtScroll2" style="width: 100000px;">
                   <div class="nspArtPage" style="width: 350px; float: left;">
                      <div style="width: 100%!important;" class="nspArt">
                         <div style="padding: 0 10px 0 0">
                            <h4 class="nspHeader tleft fnone line_h_20">
                               <a class="new_left_title" title="{{$hot_new->name}}" href="/newletters/{{$hot_new->alias}}">
                               {{$hot_new->name}}
                               </a>
                               <span class="new_icon"></span>
                            </h4>
                            <a title="" class="tleft fleft" href="#">
                            <img class="nspImage tleft fleft news_img" style="" alt="" src="/client_assets/images/designs/noimages.jpg">
                            </a>
                            <p class="nspText tleft fleft new_desc_left">
                               {!!$hot_new->desc!!}                                  
                            </p>
                            <p class="nspInfo  tleft fleft"></p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div style="width: 47.9%;" class="nspLinksWrap right">
             <div style="margin: 0 0 0 5px;" class="nspLinks">
                <div class="nspLinkScroll1" style="width: 320px; overflow: hidden;">
                   <div class="nspLinkScroll2" style="width: 100000px;">
                      <ul style="width: 320px; float: left;" class="nspList">
                          @foreach($list_new as $item)
                            <li class="even">
                              <h4>
                                <a href="/newletters/{{$item->alias}}" title="{{$item->name}}">{{$item->name}}</a>
                                <span class="new_icon"></span>
                              </h4>
                            </li>
                          @endforeach
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>

@if(count($list_cate_parent) > 0)
  @foreach($list_cate_parent as $item)
    <div class="postbox">

       <h1 class="widgettitle">
          <a title="{{$item->name}}" href="/categories/{{$item->alias}}/"><span>{{$item->name}}</span></a>
          <?php
              $list_sub_cate  = App\Category::where('parentID',$item->id)->get();
           ?>
          @if(count($list_sub_cate) > 0)
            @foreach($list_sub_cate as $sub)
              <span class="subcatetitle">
                <a title="{{$sub->name}}" href="/categories/{{$sub->alias}}/" style="font-weight: normal; background-image: none; font-size: 11px; text-transform: none; color: rgb(51, 51, 51);">{{$sub->name}}|</a>
              </span>
            @endforeach
          @endif
      </h1>
      <?php
        $new_in_cate = App\News::where('cate_id',$item->id)
                                ->where('isDraft',0)
                                ->where('isBrowse',0)
                                ->where('isPublish',0)
                                ->paginate(5);
        unset($new_in_cate[count($new_in_cate)-1]);
        $new_first = App\News::orderBy('id','desc')
                                ->where('cate_id',$item->id)
                                ->where('isDraft',0)
                                ->where('isBrowse',0)
                                ->where('isPublish',0)
                                ->first();
      ?>
     @if(count($new_first) > 0)
      <div class="boxleft">
        <h2 class="normal">
           <a title="{{$new_first->name}}" href="/newletters/{{$new_first->alias}}/">{{$new_first->name}}</a>
        </h2>
        <div class="imgtypo">
           <div class="newscalendar" id="dnn_ListArticle_rptLstArticle_Calendar_3">
              <div style="width: 100%; height: 100%">
                 @if($new_first->image == "none.png")
                    <span class="calheader">
                     <?php echo date('j',strtotime($new_first->created_at)); ?>
                   </span>
                   <span class="calbottom">
                      <?php echo date('m',strtotime($new_first->created_at)); ?>
                      -
                      <?php echo date('Y',strtotime($new_first->created_at)); ?>
                   </span>
                 @else
                    <img class="imgtypo" title="{{$new_first->name}}" src="/client_assets/upload/images/new/{{$new_first->image}}" alt="{{$new_first->name}}">
                 @endif
              </div>
           </div>
        </div>
        <span class="describe" style="font-size: 13px !important; font-family: Tahoma !important">
        </span><a href="/newletters/{{$new_first->alias}}">{{$new_first->name}}</a>
     </div>
     @endif
   
   <div class="boxright">
      @if(count($new_in_cate) > 0)
        <ul>
          @foreach($new_in_cate as $new)
             <li style="float: left;">
                <a style="float: left;" href="/newletters/{{$new->alias}}">{{$new->name}}
                  <span></span>
                </a>
            </li>
          @endforeach
        </ul>
      @endif
   </div>
</div>
  @endforeach
@endif

@endsection