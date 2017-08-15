<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="shortcut icon" href="utehy.ico" />
	<title>@yield('title')</title>
   <meta name="description" content="@yield('meta_desc')"/>
   <meta name="news_keywords" content="@yield('meta_key')" />
   <meta name="original-source" content="@yield('links')" />
   <meta name="robots" content="noodp"/>
   <meta property="og:locale" content="en_US" />
   <meta property="og:type" content="article" />
   <meta property="og:title" content="@yield('title')" />
   <meta property="og:description" content="@yield('meta_desc')" />
   <meta property="og:url" content="@yield('links')" />
	@include('client.includes.js')
	@include('client.includes.css')
</head>
	<body class="homepage">
      <div>
         <div id="mask" style="width: 1349px; height: 3045px;"></div>
      </div>
      <div class="main_demo container-fluid">
         <div class="adv" id="adv1" style="margin-top: 1px; display: inline;">
            <a href="#">
            <img src="/client_assets/images/banner/trai.jpg" width="123px">
            </a>
         </div>
         <div class="content_demo">
            @include('client.includes.header')
            <div id="body" style="overflow: hidden">
              @include('client.includes.carousel')
               <div class="primary">
                  <div class="wrap" id="skip" role="main">
                     <div id="content">
                        <div id="promo" class="clearfix">
                           @include('client.includes.slidebar')
                           <div class="columnleft">
                              @yield('content')
                           </div>
                        </div>
                        @include('client.includes.bottom')
                     </div>
                  </div>
               </div>
            </div>
           	@include('client.includes.footer')
            <div id="div-toTop" title="Lên đầu trang" style="display: block;">
               <img src="/client_assets/images/designs/top.png">
            </div>
         </div>
         <div class="adv" style="margin-top: 1px; display: inline;" id="adv2">
            <a href="#">
            	<img src="/client_assets/images/banner/phai.jpg" width="120">
            </a>
         </div>
         <div class="clear"></div>
		@yield('scripts')
      </div>
   </body>
</html>