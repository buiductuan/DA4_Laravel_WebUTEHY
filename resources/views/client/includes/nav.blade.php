<div id="nav">
  <div id="jv-mainnav">
     <div class="jv-block">
        <div class="jv-inner clearfix">
           <span class="item-menu ml"></span>
           <span class="item-menu mr"></span>
           <div class="jv-menu u-1 ">
              <ul class="menu mainmenu dropdown">
                 <li class=""><a href="/"></a></li>
                  @if(count($menu) > 0)
                    @foreach($menu as $item)
                        <?php

                          $sub_menu = App\Category::orderBy('orderBy','desc')->where('parentID',$item->id)->get();

                         ?>
                         <li class="item-103 deeper parent">
                            <a 
                                href="/categories/{{$item->alias}}"
                                  title="">{{$item->name}}
                                  <span></span>
                            </a>
                            <ul>
                              @foreach($sub_menu as $sub)
                                 <li class="item-1">
                                    <a href="/categories/{{$sub->alias}}">
                                      <span>{{$sub->name}}</span>
                                    </a>
                                 </li>
                               @endforeach
                            </ul>
                         </li>
                    @endforeach
                 @endif
              </ul>
           </div>
        </div>
     </div>
  </div>
</div>