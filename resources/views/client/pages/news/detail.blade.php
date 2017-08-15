@extends('client.layouts.master')

@section('title')
  Website thông tin Trường Đại Học Sư Phạm Kỹ Thuật Hưng Yên
@endsection

@section('content')
<div class="postbox">
    
    <div id="paths">
        <a class="home" href="/">Trang chủ</a>
        »
          <?php 
              $cate = App\Category::find($newletter->cate_id);
           ?>
        <a rel="category tag" title="<?php  echo $cate->name;?>" href="#">
          <?php  echo $cate->name;?>
        </a>
        »
        <strong>
           {{$newletter->name}}
        </strong>
    </div>
    
    <div class="clear"></div>
    
    <div class="postmeta left">
        <h2 class="posttitle"></h2>
        <span class="left">Đăng bởi
            <b>Ban Biên Tập </b>
            ngày {{date_format($newletter->created_at,'d/m/Y')}}
        </span>
        <span class="comment right">
          <a class="comments-link" title="" href="#">0 phản hồi</a>
        </span>
    </div>
    
    <div class="clear"></div>

    <div class="entry">
        {!! $newletter->detail !!}

        @if($newletter->tags != "")
          <div class="tags">
            <?php 
                $arr_tags = explode(",",$newletter->tags);
                
                foreach($arr_tags as $item){
                   echo "<a href=\"/hastag/".uri_friendly(trim($item))."\"> ".trim($item)." </a> ";
                }
            ?>
          </div>
        @endif
    </div>
    
    <div class="clear"></div>


    <h1 class="widgettitle">
        <a href="#">
            <span>Cùng chuyên mục</span>
        </a>
    </h1>

    <div class="boxleft" style="width: 666px !important;">
        <div class="center-box-d">
            <div class="cate-news">
                <ul>
                    @foreach($list_newcate as $item)
                      <li>
                          <a title="{{$item->name}}" href="/newletters/{{$item->alias}}">{{$item->name}}</a>
                          <span>({{date_format($item->created_at,'d/m/Y')}})</span>
                      </li>
                    @endforeach
                    <li class="cate-title" style="background: none !important"></li>
                </ul>
            </div>
            <br style="clear: both;">
            <br>
        </div>
    </div>

    <div class="clear"></div>

    <div id="comments">
        <h3>Phản hồi đến “{{$newletter->name}}”</h3>   
    </div>

    <div id="respond">
      <h3>Gửi phản hồi</h3>

      <form action="" method="post">
        <div class="thongtin_comment">
              <div id="regis-form" style="margin-top: 20px">
                  <div class="row">
                      <span class="col-l">
                          <span class="abbr">*</span>
                          Họ và tên:
                      </span>
                      <span class="col-r">
                          <input class="text-box single-line" data-val="true" data-val-required="Nhập họ tên" name="_FullName" type="text" value="">
                          <span class="field-validation-valid" data-valmsg-for="_FullName" data-valmsg-replace="true"></span>
                      </span>
                  </div>
                  <div class="row">
                      <span class="col-l"><span class="abbr"></span>Địa chỉ:</span>
                      <span class="col-r">
                          <input class="text-box single-line" name="_Address" type="text" value="">
                          <span class="field-validation-valid" data-valmsg-for="_Address" data-valmsg-replace="true"></span>
                      </span>
                  </div>
                  <div class="row">
                      <span class="col-l">
                          <span class="abbr"></span>
                          Số điện thoại:
                      </span>
                      <span class="col-r">
                          <input class="text-box single-line" name="_PhoneNumber" type="text" value="">
                          <span class="field-validation-valid" data-valmsg-for="_PhoneNumber" data-valmsg-replace="true"></span>
                      </span>
                  </div>
                  <div class="row">
                      <span class="col-l">
                          <span class="abbr"></span>
                          Email:
                      </span>
                      <span class="col-r">
                          <input class="text-box single-line" name="_Email" type="text" value="">
                          <span class="field-validation-valid" data-valmsg-for="_Email" data-valmsg-replace="true"></span>
                      </span>
                  </div>
                  <div class="row">
                      <span class="col-l">
                          <span class="abbr">*</span>
                          Tiêu đề:
                      </span>
                      <span class="col-r" style="width:400px !important">
                          <input data-val="true" data-val-required="Nhập tiêu đề " name="_Title" type="text" value="">
                          <span class="field-validation-valid" data-valmsg-for="_Title" data-valmsg-replace="true"></span>
                      </span>
                  </div>
              </div>
          </div>
          <div class="clear"></div>
          <div class="comment_mess">
              <div class="row">
                  <span class="col-l">
                      <span class="abbr">*</span>
                      Nội dung:
                  </span>
                  <span class="col-r">
                      <textarea cols="20" data-val="true" data-val-required="Nhập nội dung" name="_Content" rows="2"></textarea>
                      <span class="field-validation-valid" data-valmsg-for="_Content" data-valmsg-replace="true"></span>
                  </span>
              </div>
              <div class="row">
                  <div class="col-l">
                      <span class="abbr"></span>
                  </div>
                  <div class="col-r">
                      <input id="submit" type="submit" value="Gửi phản hồi" tabindex="6" name="submit">
                      <div id="cancel-comment-reply">
                          <small>
                              <a id="cancel-comment-reply-link" style="" href="#respond" rel="nofollow">Hủy bỏ</a>
                          </small>
                      </div>
                  </div>
              </div>
          </div>
      </form>

      <div class="clear"></div>
    </div>
</div>
@endsection