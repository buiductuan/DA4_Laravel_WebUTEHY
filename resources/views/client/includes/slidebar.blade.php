<div class="slidebar">
   <h1 class="widgettitle">
      <a href="http://tuyensinh.utehy.edu.vn" target="blank">
      <span>TUYỂN SINH 2017</span>
      </a>
      <img alt="" src="/client_assets/images/designs/New-Arrow.gif" width="60px" height="32px" border="0">     
   </h1>
   <div class="clearfix"></div>
   <div style="font-family: Arial; line-height: 24px; padding-left: 5px; font-size: 24px; font-weight: bold; padding-top:10px; padding-bottom:10px;">
      <ul>
         <li>
            <a style="color: Red; font-size: 16px;" target="_blank" href="http://tuyensinh.utehy.edu.vn/Announcement.aspx?id=1041">Tuyển sinh vào ĐH, CĐ, DBĐH</a>
            <div style="font-family: Arial; padding-left: 20px; font-size: 16px;">
               Đối tượng: <br>
               - Thi THPTQG 2017 <br>
               - Tốt nghiệp THPT hoặc tương đương
               <br>
            </div>
         </li>
         <li>
            <a style="color: Green; font-size: 16px;" target="_blank" href="#">Câu hỏi về TUYỂN SINH 2017</a>
         </li>
         <li>
            <a style="color: Blue; font-size: 16px;" target="_blank" href="#">Đề án Tuyển sinh 2017</a>
         </li>
         <li>
            <a style="color: Maroon; font-size: 16px;" target="_blank" href="#">Học bổng khuyến khích</a>
         </li>
      </ul>
   </div>
   <center>
      <a href="#">
      <img class="imgleft" alt="" src="/client_assets/images/trungtuyen.jpg" width="250px" height="100%" border="0">
      </a>
      <a href="#">
      <img class="imgleft" alt="" src="/client_assets/images/anhtuyensinh.png" width="250px" height="100%" border="0">
      </a>
      <a style="width: 230px; background-color: #fa6800; font-family: Arial; line-height: 24px; margin-bottom: 10px; padding: 10px; font-size: 16px; color: #FFF; " href="#">
      MỘT SỐ BÀI BÁO QUỐC TẾ<br>
      TIÊU BIỂU CỦA GIẢNG VIÊN                 
      </a>
      <a href="#">
      <img class="imgleft" alt="" src="/client_assets/images/Edusoft.gif" width="250px" height="100%" border="0">
      </a>
      <a style="width: 230px; background-color: #fa6800; font-family: Arial; line-height: 24px; margin-bottom: 10px; padding: 10px; font-size: 16px; color: #FFF; " href="http://tapchi.utehy.edu.vn">
      TẠP CHÍ KH &amp; CN                 
      </a>
   </center>
   <h1 class="widgettitle">
      <a><span>Website các đơn vị</span> </a>
   </h1>
   <div class="clearfix"></div>
   <div class="widgetbox">
      <?php 
         $faculties = App\Faculty::all();
       ?>
      <ul>
         @if(count($faculties) > 0)
            @foreach($faculties as $item)
               <li><a href="{{$item->link}}">{{$item->name}}</a> </li>
            @endforeach
         @endif
      </ul>
      <div class="clearfix"></div>
   </div>
   <h1 class="widgettitle">
      <a href="#"><span>Video giới thiệu</span> </a>
   </h1>
   <div class="textwidget">
      <a href="#">
         <object width="250" height="203">
            <param name="movie" value="http://www.youtube.com/v/bVW6cEvr6bs?rel=0&amp;hl=vi&amp;fs=1">
            <param name="allowFullScreen" value="true">
            <param name="allowscriptaccess" value="always">
            <embed src="http://www.youtube.com/v/bVW6cEvr6bs?rel=0&amp;hl=vi&amp;fs=1" type="application/x-shockwave-flash" width="250" height="203" allowscriptaccess="always" allowfullscreen="true">
         </object>
      </a>
   </div>
   <center>
      <a href="http://doanthanhnienspkt.vn/">
      <img alt="" src="/client_assets/images/designs/doantn.jpg" width="120px" height="100%" border="0">
      </a>     
      <a href="http://cokhivietnam.vn/">
      <img class="imgleft" alt="" src="/client_assets/images/designs/mangsec.jpg" width="250px" height="100%" border="0">
      </a>
      <a href="http://aptech.utehy.edu.vn/">
      <img class="imgleft" alt="" src="/client_assets/images/designs/Aptech.jpg" width="250px" height="100%" border="0">
      </a>
      <a href="http://chuancntt03.utehy.edu.vn/">
      <img class="imgleft" alt="" src="/client_assets/images/designs/chuancntt.jpg" width="250px" height="100%" border="0">
      </a>
   </center>
</div>