@extends('client.layouts.master')

@section('title')
  Website thông tin Trường Đại Học Sư Phạm Kỹ Thuật Hưng Yên
@endsection

@section('content')
    <div class="postbox">
        <div id="paths">
            <a class="home" href="/">Trang chủ</a> » <a rel="category tag" title="Trường đại học spkt Hưng Yên" href="category/{{$cate_new->alias}}">{{$cate_new->name}}
            </a>
        </div>
        <?php
          $list_new_to_cate = App\Category::where('parentID',$cate_new->id)->get();
        ?>
        <div class="clear"></div>
        @if(count($list_new_to_cate) > 0)
          
            @foreach($list_new_to_cate as $item)
              <h1 class="widgettitle">
              <a href="category/{{$cate_new->alias}}"><span>{{$item->name}}</span></a>
              </h1>
              <?php
                $news = App\News::where('cate_id',$item->id)->paginate(5);
                $news_first = App\News::where('cate_id',$item->id)->first();
                unset($news[0]);
              ?>
              <div class="center-box-d">
                  <div class="cate-news">
                      <ul>
                          @if(count($news_first) > 0)
                            <li class="cate-title" style="background: none !important; padding-left: 0px !important">
                                   <img class="image-small" alt="utehy.edu.vn" title="utehy.edu.vn" src="../../client_assets/upload/images/new/{{$news_first->image}}">
                              <a style="color:#B50007 !important" href="/newsletters/{{$news_first->alias}}">{{$news_first->name}}</a>
                              <div class="cate-postdate">
                                  <span>Ngày đăng: {{date_format($news_first->created_at,"d/m/Y")}}</span>
                              </div>
                              <span>
                                  <p>

                                      <span>&nbsp;Phiếu đăng ký xét tuyển ĐH chính quy năm 2017</span>
                                  </p>
                              </span>
                          </li>
                          @endif
                      </ul>
                  </div>
                  <br style="clear: both;">
                  <ul class="cate-newsOther">
                         @if(count($news) > 0)
                           @foreach($news as $item)
                            <li>
                                <a href="/newsletters/{{$item->alias}}">
                                  {{$item->name}}
                                </a>
                                <span>({{date_format($news_first->created_at,"d/m/Y")}})</span>
                            </li>
                           @endforeach
                         @else
                          <h5>Không có tin tức liên quan</h5>
                         @endif
                  </ul>
              </div>      
            @endforeach

        @else

        @endif
    </div>
@endsection