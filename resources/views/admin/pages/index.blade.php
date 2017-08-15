@extends('admin.layouts.master')

@section('title')
@endsection

@section('content')
	<div class="wrapper container-fluid">
		{{-- tin bai --}}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">Tin bài</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 text-center">
								<a href="{{ route('get_create_new') }}">
									<i class="fa fa-newspaper-o fa-3x"></i><br>
									<span>Đăng tin mới</span>
								</a>
							</div>
							<div class="col-md-3 text-center">
								<a href="{{ route('get_browse') }}">
									<i class="fa fa-hourglass-half fa-3x"></i><br>
									<span>Tin chờ duyệt</span> <span class="badge">{{count($num_br_new)}}</span>
								</a>
							</div>
							<div class="col-md-3 text-center">
								<a href="{{ route('get_published') }}">
									<i class="fa fa-globe fa-3x"></i><br>
									<span>Tin đã xuất bản</span> 
									<span class="badge">{{count($num_published_new)}}</span>
								</a>
							</div>
							<div class="col-md-3 text-center">
								<a href="{{ route('get_trash') }}">
									<i class="fa fa-trash fa-3x"></i><br>
									<span>Tin đã xóa</span> <span class="badge">{{count($num_trash_new)}}</span>
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{ route('get_search') }}">
									<i class="fa fa-search fa-3x"></i><br>
									<span>Tìm kiếm bản tin</span>
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{route('get_draft')}}">
									<i class="fa fa-newspaper-o fa-3x"></i><br>
									<span>Tin đang soạn</span> <span class="badge">{{count($num_dr_new)}}</span>
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{ route('get_publish') }}">
									<i class="fa fa-hourglass-o fa-3x"></i><br>
									<span>Tin chờ xuất bản</span> <span class="badge">{{count($num_pl_new)}}</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>

		{{-- chuyen muc --}}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">Chuyên mục</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 text-center margin-top-30">
								<a href="/">
									<i class="fa fa-newspaper-o fa-3x"></i><br>
									Quản lý tin đặc biệt
								</a>
							</div>
							<div class="col-md-3 text-center margin-top-30">
								<a href="{{ route('manager_employee') }}">
									<i class="fa fa-users fa-3x"></i><br>
									Quản lý cán bộ
								</a>
							</div>
							<div class="col-md-3 text-center margin-top-30">
								<a href="{{ route('manager_file') }}">
									<i class="fa fa-file fa-3x"></i><br>
									Quản lý file đính kèm
								</a>
							</div>
							<div class="col-md-3 text-center margin-top-30">
								<a href="/admin/category">
									<i class="fa fa-file-o fa-3x"></i><br>
									Quản lý chuyên mục
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{ route('manager_sciencestudy') }}">
									<i class="fa fa-file fa-3x"></i><br>
									Quản lý đề tài khoa học
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{route('manager_faculty')}}">
									<i class="fa fa-home fa-3x"></i><br>
									Quản lý khoa
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{ route('manager_document') }}">
									<i class="fa fa-newspaper-o fa-3x"></i><br>
									Quản lý văn bản
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{ route('manager_documenttype') }}">
									<i class="fa fa-file-pdf-o fa-3x"></i><br>
									Quản lý loại tài liệu
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="/">
									<i class="fa fa-globe fa-3x"></i><br>
									Quản lý TB tuyển dụng
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="/">
									<i class="fa fa-file-text-o fa-3x"></i><br>
									Quản lý điểm
								</a>
							</div>
							<div class="col-md-3 margin-top-30 text-center">
								<a href="{{ route('manager_subject') }}">
									<i class="fa fa-file fa-3x"></i><br>
									Quản lý BM-B-P
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>

		{{-- Y kien --}}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">Ý kiến</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 text-center">
								<a href="/">
									<i class="fa fa-newspaper-o fa-3x"></i><br>
									<span>Quản lý bình luận</span>
								</a>
							</div>
							<div class="col-md-4 text-center">
								<a href="/">
									<i class="fa fa-hourglass-half fa-3x"></i><br>
									<span>Quản lý câu hỏi</span> <span class="badge">0</span>
								</a>
							</div>
							<div class="col-md-4 text-center">
								<a href="/">
									<i class="fa fa-globe fa-3x"></i><br>
									<span>Quản lý phản hồi</span> <span class="badge">0</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection