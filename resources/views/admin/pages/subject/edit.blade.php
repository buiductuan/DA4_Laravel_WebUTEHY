@extends('admin.layouts.master')

@section('title')
	Cập nhật thông tin BM-B-P
@endsection

@section('content')
	<form action="/admin/subject/edit/{{$subject->id}}" method="POST">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('create_subject') }}">Thêm mới bộ môn-Ban-Phòng</a><hr>
						<a href="{{ route('manager_subject') }}">Danh sách BM-B-P</a><hr>
						<a href="{{ route('trash_subject') }}">BM-B-P đã xóa <span class="badge">{{$num_trash_subject}}</span></a><hr>
						<a href="#">Tìm kiếm BM-B-P </a><hr>
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
										<select name="sl_faculty" class="form-control">
											<option value="0">-- Chọn Khoa --</option>
											@foreach($faculties as $i)
												<option {{$subject->facultyID == $i->id ? "selected" : ""}} value="{{$i->id}}">{{$i->name}}</option>
											@endforeach
										</select>
									@else
										<h4>Hệ thống chưa có Khoa. Thêm mới Khoa <a href="{{ route('create_faculty') }}"> tại đây.</a></h4>
									@endif
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tên bộ môn - ban - ngành <small class="text-danger">(*)</small></label>
										<input type="text" value="{{$subject->name}}"  placeholder="Tên bộ môn - ban - ngành" name="subjectName" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="">Mô tả</label>
									<textarea name="subjectDesc" class="form-control" rows="4">
										{{$subject->desc}}
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('scripts')
	<script>
		
	</script>
@endsection