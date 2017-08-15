@extends('admin.layouts.master')

@section('title')
	Thêm cán bộ
@endsection

@section('content')
	<form action="/admin/employee/create" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('create_employee') }}">Thêm mới cán bộ</a><hr>
						<a href="{{ route('manager_employee') }}">Danh sách cán bộ</a><hr>
						<a href="{{ route('trash_employee') }}">Cán bộ đã xóa <span class="badge">{{$num_trash_employee}}</span></a><hr>
						<a href="#">Tìm kiếm cán bộ </a><hr>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-default" type="submit">Thêm mới</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_subject')}}" class="btn btn-default">Hủy bỏ</a>
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
								<div class="col-md-4">
									@if(count($faculties) > 0)
										Thuộc Khoa : <select name="sl_faculty" id="sl_faculty" class="form-control">
											@foreach($faculties as $i)
												<option value="{{$i->id}}">{{$i->name}}</option>
											@endforeach
										</select>
									@else
										<h4>Hệ thống chưa có Khoa. Thêm mới Khoa <a href="{{ route('create_faculty') }}"> tại đây.</a></h4>
									@endif
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-4">
									@if(count($faculties) > 0)
										Bộ môn - ban - ngành : 
										<select name="sl_subject" id="sl_subject" class="form-control"></select>
									@else
										<h4>Hệ thống chưa có Khoa. Thêm mới Khoa <a href="{{ route('create_faculty') }}"> tại đây.</a></h4>
									@endif
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tên<small class="text-danger">(*)</small></label>
										<input type="text" placeholder="Tên cán bộ" name="name" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Địa chỉ</label>
										<input type="text" placeholder="Địa chỉ" name="address" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Họ và tên đệm<small class="text-danger">(*)</small></label>
										<input type="text" placeholder="Họ và tên đệm" name="fullname" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Email<small class="text-danger">(*)</small></label>
										<input type="text" placeholder="Email" name="email" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Giới tính</label>
										<input type="radio" name="rdGender" checked="" value="0"> Nam
										<input type="radio" name="rdGender" value="1"> Nữ
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Di động</label>
										<input type="text" placeholder="Di động" name="mobilephone" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Ngày sinh</label>
										<input type="date" name="dob" class="form-control" placeholder="Ngày sinh">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">ĐT ở nhà</label>
										<input type="text" placeholder="ĐT ở nhà" name="homephone" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Chức danh</label>
										<input type="text" name="department" class="form-control" placeholder="Chức danh">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Fax</label>
										<input type="text" placeholder="Fax" name="fax" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Trình độ <small class="text-danger">(*)</small></label>
										<input type="text" name="education" class="form-control" placeholder="Trình độ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Website</label>
										<input type="text" placeholder="Website" name="website" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Chức vụ</label>
										<input type="text" name="office" class="form-control" placeholder="Chức vụ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Chọn ảnh</label>
										<input type="file" name="img">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Phòng làm việc</label>
										<input type="text" name="room_work" class="form-control" placeholder="Phòng làm việc">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Đường dẫn</label>
										<input type="text" placeholder="Đường dẫn" name="link" class="form-control">
									</div>
								</div>
							</div><hr>
							<div class="row">
								<label for="">Giới thiệu chi tiết</label>
								<textarea name="desc" class="ckeditor" id="demo"></textarea>
							</div><hr>
							<div class="row">
								<label for="">Lĩnh vực nghiên cứu</label>
								<textarea name="research_area" class="ckeditor" id="demo"></textarea>
							</div><hr>
							<div class="row">
								<label for="">Hồ sơ nghiên cứu khoa học</label>
								<textarea name="scientific_research" class="ckeditor" id="demo"></textarea>
							</div><hr>
							<div class="row">
								<label for="">Hiển thị : </label>
								<input type="radio" name="rdStatus" value="1" checked=""> Có
								<input type="radio" name="rdStatus" value="0"> Không
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="">Sắp xếp : </label>
									<input type="text" name="orderBy" value="0">
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default" type="submit">Thêm mới</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_subject')}}" class="btn btn-default">Hủy bỏ</a>
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
			$(window).load(function(){
				var i = $('#sl_faculty').val();
				$.get('/admin/employee/ajax/getSubject/'+i,function(result){
					$('#sl_subject').html(result);
				});
			});

			$('#sl_faculty').change(function(){
				var i = $(this).val();
				$.get('/admin/employee/ajax/getSubject/'+i,function(result){
					$('#sl_subject').html(result);
				});
			});
		});
	</script>
@endsection