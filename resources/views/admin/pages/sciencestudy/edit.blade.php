@extends('admin.layouts.master')

@section('title')
	Cập nhật đề tài nghiên cứu khoa học
@endsection

@section('content')
	<form action="/admin/sciencestudy/edit/{{$sciencestudy->id}}" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('create_sciencestudy') }}">Thêm mới đề tài</a><hr>
						<a href="{{ route('manager_sciencestudy') }}">Danh sách đề tài</a><hr>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-default" type="submit">Cập nhật</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_sciencestudy')}}" class="btn btn-default">Hủy bỏ</a>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					</div>
					<div class="panel-body">
						<div class="container-fluid">
							@if(count($errors) > 0)
								<div class="row">
									@foreach($errors->all() as $err)
										<div class="alert alert-danger">
											{{$err}}
										</div>
									@endforeach
								</div><hr>
							@endif
							<div class="row">
								<div class="col-md-3">
									<select name="sl_level" class="form-control">
										<option value="0" {{$sciencestudy->level == 0 ? "selected":""}}>-- Chọn cấp đề tài --</option>
										<option value="1" {{$sciencestudy->level == 1 ? "selected":""}}>Đề tài cấp trường</option>
										<option value="2"  {{$sciencestudy->level == 2 ? "selected":""}}>Đề tài cấp quốc gia</option>
										<option value="3"  {{$sciencestudy->level == 3 ? "selected":""}}>Đề tài cấp quốc tế</option>
									</select>
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-3">
									<label for="">Mã đề tài</label>
									<input type="text" value="{{$sciencestudy->sciencestudy_id}}" name="sciencestudy_id" class="form-control" placeholder="Mã đề tài">
								</div>
								<div class="col-md-9">
									<label for="">Tên đề tài</label>
									<input type="text" value="{{$sciencestudy->name}}" name="name" class="form-control" placeholder="Tên đề tài">
								</div> 
							</div><hr>
							<div class="row">
								<label for="">Mô tả đề tài</label>
								<textarea name="desc" id="demo" class="ckeditor">
									{{$sciencestudy->desc}}
								</textarea>
							</div><hr>
							<div class="row">
								<label for="">Nội dung đề tài</label>
								<textarea name="detail" id="demo" class="ckeditor">
									{{$sciencestudy->detail}}
								</textarea>
							</div><hr>
							<div class="row">
								<div class="col-md-4">
									<label for="">Tác gia</label>
									<input type="text" class="form-control" value="{{$sciencestudy->author}}" placeholder="Tác gia" name="author">
								</div>
								<div class="col-md-4">
									<label for="">Ngày bắt đầu</label>
									<input type="date" name="begin" class="form-control"
											value = "<?php 
												$begin = strtotime($sciencestudy->begin);
												echo date('Y-m-d',$begin);
											 ?>"
									>
								</div>
								<div class="col-md-4">
									<label for="">Ngày kết thúc</label>
									<input type="date" name="end" class="form-control"
										value = "<?php 
												$end = strtotime($sciencestudy->end);
												echo date('Y-m-d',$end);
											 ?>"
									>
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-3">
									<label for="">Sắp xếp</label>
									<input type="text" class="form-control" name="orderBy" value="{{$sciencestudy->orderBy}}">
								</div>
								<div class="col-md-4">
									<br><br>
									<label for="">Hiển thị</label>&nbsp;&nbsp;&nbsp;
									<input {{$sciencestudy->status == 1 ? "checked":""}} type="radio" name="rdStatus" checked="" value="1"> Có
									&nbsp;&nbsp;&nbsp;
									<input {{$sciencestudy->status == 0 ? "checked":""}} type="radio" name="rdStatus" value="0"> Không
								</div>
							</div><hr>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default" type="submit">Cập nhật</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_sciencestudy')}}" class="btn btn-default">Hủy bỏ</a>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('scripts')
	<script src="/admin_assets/component_brower/ckeditor/ckeditor.js"></script>
	<script>
		$(function(){
			
		});
	</script>
@endsection