@extends('admin.layouts.master')

@section('title')
	Cập nhật loại tài liệu
@endsection

@section('content')
	<form action="/admin/documenttype/edit/{{$documenttype->id}}" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('create_documenttype') }}">Thêm mới loại tài liệu</a><hr>
						<a href="{{ route('manager_documenttype') }}">Danh sách loại tài liệu</a><hr>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button class="btn btn-default" type="submit">Cập nhật</button>
						<button class="btn btn-default" title="Làm mới lại các ô nhập dữ liệu" type="reset">Làm mới</button>
						<a href="{{ route('manager_documenttype')}}" class="btn btn-default">Hủy bỏ</a>
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
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tên loại tài liệu</label>
										<input type="text" value="{{$documenttype->name}}" class="form-control" placeholder="Tên loại tài liệu" name="name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="">Hiển thị</label>
									<input type="radio" value="1" {{$documenttype->status == 1 ? "checked" : ""}} name="rdStatus"> Có
									<input type="radio" {{$documenttype->status == 0 ? "checked" : ""}} value="0" name="rdStatus"> Không
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
@endsection