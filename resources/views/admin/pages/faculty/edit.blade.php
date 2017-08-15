@extends('admin.layouts.master')

@section('title')
	Câp nhật thông tin Khoa
@endsection

@section('content')
	<form action="/admin/faculty/edit/{{$faculty->id}}" method="POST">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('create_faculty') }}">Thêm mới khoa</a><hr>
						<a href="{{ route('manager_faculty') }}">Danh sách khoa</a><hr>
						<a href="{{ route('trash_faculty') }}">Khoa đã xóa <span class="badge">{{$num_trash_faculty}}</span></a><hr>
						<a href="#">Tìm kiếm khoa </a><hr>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="user_id" value="{{$auth->id}}">
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-default" type="submit">Cập nhật</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_faculty')}}" class="btn btn-default">Hủy bỏ</a>
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
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Mã khoa <small class="text-danger">(*)</small></label>
										<input readonly="" type="text" value="{{$faculty->id}}"  placeholder="Mã khoa" name="facultyID" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tên khoa <small class="text-danger">(*)</small></label>
										<input type="text" value="{{$faculty->name}}"  placeholder="Tên khoa" name="facultyName" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="">Mô tả</label>
									<textarea name="facultyDesc" class="form-control" rows="4">
										{{$faculty->desc}}
									</textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Điện thoại</label>
										<input type="text" value="{{$faculty->phone}}" placeholder="Điện thoại" name="phone" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Website</label>
										<input type="text" value="{{$faculty->website}}" placeholder="Website" name="website" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">Đường dẫn</label>
										<input type="text" value="{{$faculty->link}}" placeholder="Tên khoa" name="link" class="form-control">
									</div>
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