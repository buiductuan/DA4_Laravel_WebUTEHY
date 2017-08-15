@extends('admin.layouts.master')

@section('title')
	Cập nhật cán bộ
@endsection

@section('content')
	<form action="/admin/employee/edit/{{$employee->id}}" method="POST" enctype="multipart/form-data">
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
						<button class="btn btn-default" type="submit">Cập nhật</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_subject')}}" class="btn btn-default">Hủy bỏ</a>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" id="subjectID" value="{{$employee->subjectID}}">
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
												<option {{$employee->facultyID == $i->id ? "selected" : ""}} value="{{$i->id}}">{{$i->name}}</option>
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
										<input type="text" value="{{$employee->name}}" placeholder="Tên cán bộ" name="name" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Địa chỉ</label>
										<input type="text"  value="{{$employee->address}}" placeholder="Địa chỉ" name="address" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Họ và tên đệm<small class="text-danger">(*)</small></label>
										<input type="text"  value="{{$employee->fullname}}" placeholder="Họ và tên đệm" name="fullname" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Email<small class="text-danger">(*)</small></label>
										<input type="text"  value="{{$employee->email}}" placeholder="Email" name="email" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Giới tính</label>
										<input type="radio" name="rdGender" {{$employee->gender == 0 ? "checked" : ""}} value="0"> Nam
										<input type="radio" {{$employee->gender == 1 ? "checked" : ""}} name="rdGender" value="1"> Nữ
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Di động</label>
										<input type="text" value="{{$employee->mobilephone}}"  placeholder="Di động" name="mobilephone" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Ngày sinh</label>
										<input type="date" value="<?php $time=strtotime($employee->dob); echo date("Y-m-d",$time); ?>"  name="dob" class="form-control" placeholder="Ngày sinh">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">ĐT ở nhà</label>
										<input type="text" value="{{$employee->homephone}}"  placeholder="ĐT ở nhà" name="homephone" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Chức danh</label>
										<input type="text" value="{{$employee->department}}"  name="department" class="form-control" placeholder="Chức danh">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Fax</label>
										<input type="text" value="{{$employee->fax}}"  placeholder="Fax" name="fax" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Trình độ <small class="text-danger">(*)</small></label>
										<input type="text" value="{{$employee->education}}"  name="education" class="form-control" placeholder="Trình độ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Website</label>
										<input type="text" value="{{$employee->website}}"  placeholder="Website" name="website" class="form-control">
									</div>
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Chức vụ</label>
										<input type="text" value="{{$employee->office}}"  name="office" class="form-control" placeholder="Chức vụ">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<img width="100" id="img-view" class="img-responsive"  src="/admin_assets/upload/images/employee/{{$employee->image}}" alt="">
											</div>
											<div class="col-md-6">
												<br>
												<label for="">Chọn ảnh</label>
												<input onchange="readURL(this);" type="file" name="img">
											</div>
										</div>
									</div>
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Phòng làm việc</label>
										<input type="text" value="{{$employee->room_work}}"  name="room_work" class="form-control" placeholder="Phòng làm việc">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Đường dẫn</label>
										<input type="text" value="{{$employee->link}}"  placeholder="Đường dẫn" name="link" class="form-control">
									</div>
								</div>
							</div><hr>
							<div class="row">
								<label for="">Giới thiệu chi tiết</label>
								<textarea name="desc" class="ckeditor" id="demo">
									{{$employee->desc}}
								</textarea>
							</div><hr>
							<div class="row">
								<label for="">Lĩnh vực nghiên cứu</label>
								<textarea name="research_area" class="ckeditor" id="demo">
									{{$employee->research_area}}
								</textarea>
							</div><hr>
							<div class="row">
								<label for="">Hồ sơ nghiên cứu khoa học</label>
								<textarea name="scientific_research" class="ckeditor" id="demo">
									{{$employee->scientific_research}}
								</textarea>
							</div><hr>
							<div class="row">
								<label for="">Hiển thị : </label>
								<input type="radio" name="rdStatus" value="1" {{$employee->status == 1 ? "checked" : ""}}> Có
								<input type="radio" {{$employee->status == 0 ? "checked" : ""}} name="rdStatus" value="0"> Không
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="">Sắp xếp : </label>
									<input type="text" name="orderBy"  value="{{$employee->orderBy == 0 ? "0" : $employee->orderBy}}">
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button class="btn btn-default" type="submit">Cập nhật</button>
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
			
			$('#sl_faculty').change(function(){
				var i = $(this).val();
				$.get('/admin/employee/ajax/getSubject/'+i,function(result){
					$('#sl_subject').html(result);
				});
			});

			$(window).load(function(){
				var i = $('#sl_faculty').val();
				$.get('/admin/employee/ajax/getSubject/'+i,function(result){
					$('#sl_subject').html(result);
					var subjectID = $('#subjectID').val();
					$("#sl_subject option[value = "+subjectID+"]").attr('selected','selected');
				});				
			});

		});
	</script>
	<script>
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#img-view')
	                    .attr('src', e.target.result)
	                    .width(100)
	                    .height(100);
	            };

	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	</script>
@endsection