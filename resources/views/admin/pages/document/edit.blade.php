@extends('admin.layouts.master')

@section('title')
	Cập nhật văn bản
@endsection

@section('content')
	<form action="/admin/document/edit/{{$doc->id}}" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('create_document') }}">Thêm mới văn bản</a><hr>
						<a href="{{ route('manager_document') }}">Danh sách văn bản</a><hr>
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
								<div class="col-md-4">
									@if(count($documentTypes) > 0)
										<label for="">Loại văn bản</label>
										<select name="sl_documentTypeID" class="form-control">
											@foreach($documentTypes as $docType)
												<option {{$doc->documentTypeID == $docType->id ? "selected" : ""}} value="{{$docType->id}}">{{$docType->name}}</option>
											@endforeach
										</select>
									@else
										<h3>
											Không tồn tại loại văn bản trong hệ thống.
											Thêm mới <a href="{{ route('create_documenttype') }}"> tại đây.</a>
										</h3>
									@endif
								</div>
							</div><hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tên văn bản</label>
										<input type="text" value="{{$doc->name}}" class="form-control" placeholder="Tên văn bản" name="name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Đường dẫn</label>
										<input type="file" name="link">
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
@endsection