<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/admin">
				UTEHY Administrator
				<a href="/" target="_blank"><i class="fa fa-external-link" title="Xem trang chủ"></i></a>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						 <i class="fa fa-newspaper-o"></i> Tin bài <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('get_create_new') }}">Đăng tin mới</a></li>
						<li>
							<a href="{{ route('get_browse') }}">Tin chờ duyệt 
								{{-- <span class="pull-right badge">{{count($num_br_new)}}</span> --}}
							</a>
						</li>
						<li>
							<a href="{{ route('get_publish') }}">Tin chờ xuất bản
								{{-- <span class="pull-right badge">{{count($num_pl_new)}}</span> --}}
							</a>
						</li>
						<li>
							<a href="{{ route('get_draft') }}">Tin đang soạn
								{{-- <span class="pull-right badge">{{count($num_dr_new)}}</span> --}}
							</a>
						</li>
						<li>
							<a href="{{ route('get_trash') }}">Tin đã xóa
								{{-- <span class="pull-right badge">{{count($num_trash_new)}}</span> --}}
							</a>
						</li>
						<li>
							<a href="{{ route('get_published') }}">Tin đã xuất bản
								{{-- <span class="pull-right badge">{{count($num_published_new)}}</span> --}}
							</a>
						</li>
						<li>
							<a href="{{ route('get_search') }}">Tìm kiếm bản tin</a>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						 <i class="fa fa-tags"></i> Chuyên mục <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('get_create_new')}}">Quản lý tin đặc biệt</a></li>
						<li><a href="{{ route('get_browse')}}">  </a></li>
						<li><a href="{{ route('get_publish') }}"> Quản lý file đính kèm</a></li>
						<li><a href="{{ route('get_draft') }}"> Quản lý chuyên mục</a></li>
						<li><a href="{{ route('get_trash') }}"> Quản lý đề tài khoa học</a></li>
						<li><a href="{{ route('manager_faculty') }}"> Quản lý khoa</a></li>
						<li><a href="{{ route('get_search') }}"> Quản lý văn bản</a></li>
						<li><a href="{{ route('get_search') }}"> Quản lý tài liệu</a></li>
						<li><a href="{{ route('get_search') }}"> Quản lý TB tuyển dụng</a></li>
						<li><a href="{{ route('get_search') }}"> Quản lý điểm</a></li>
						<li><a href="{{ route('manager_subject') }}"> Quản lý BM-B-P</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						 <i class="fa fa-comment"></i> Ý kiến <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ route('get_create_new')}}">Quản lý bình luận</a></li>
						<li><a href="{{ route('get_browse')}}"> Quản lý câu hỏi </a></li>
						<li><a href="{{ route('get_publish') }}"> Quản lý phản hồi</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{$auth->name}} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/admin/user/{{$auth->id}}"><i class="fa fa-user"></i> {{$auth->name}}</a></li>
						<li><a href="#"></a></li>						
						<li class="divider"></li>
						<li><a href="/auth/logout"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>