@extends('admin.layouts.master')

@section('title')
	Tạo tin tức mới 
@endsection
@section('content')
	<div class="row">
		@include('admin.includes.slidebar')
		<div class="col-md-10">
			<form id="frm_new" action="" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button id="show" class="btn btn-default">Xem trước</button>
						<button id="create" class="btn btn-default">Tạo mới</button>
						<button id="draft" class="btn btn-default">Lưu nháp</button>
						<a href="/admin" class="btn btn-default">Hủy bỏ</a>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="user_id" value="{{$auth->id}}">
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								@if(count($errors) > 0)
									<div class="form-group">
										@foreach($errors->all() as $err)
											<div class="alert alert-danger">
												{{$err}}
											</div>
										@endforeach
									</div>
								@endif
								<div class="form-group">
									<label for="">Chọn chuyên mục tin</label>
									@if(count($categories) > 0)
										<select name="cate_id" id="" class="form-control">
											@foreach($categories as $cate)
												<option value="{{$cate->id}}">{{$cate->name}}</option>
											@endforeach
										</select>
									@else
										<h3>Hệ thống không tồn tại chuyên mục. Thêm mới chuyên mục <a href="/admin/category/create"> tại đây</a></h3>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="" id="err_title">Tiêu đề bản tin <small class="text-danger">(*)</small></label>
									<textarea name="title" id="title" rows="4" class="form-control"></textarea>
								</div><hr>
								<div class="form-group">
									<label for="" id="err_desc">Lời dẫn của bản tin  <small class="text-danger">(*)</small></label>
									<textarea name="desc" id="demo" rows="10" class="ckeditor desc"></textarea>
								</div><hr>
								<div class="form-group">
									<label for="">Nội dung chi tiết <small class="text-danger">(*)</small></label>
									<textarea name="detail" id="demo" rows="10" class="ckeditor"></textarea>
								</div><hr>
								<div class="from-group">
									<label for="">Các từ khóa</label>
									<small class="pull-right">
										<i>Mỗi từ khóa cách nhau bởi dấu phẩy</i>
									</small>
									<input type="text" name="tags" class="form-control" placeholder="Tags">
								</div><hr>
								<div class="from-group">
									<label for="">Meta keyword</label>
									<input type="text" name="meta_key" class="form-control" placeholder="Meta keyword">
								</div><hr>
								<div class="from-group">
									<label for="">Meta Description</label>
									<input type="text" name="meta_desc" class="form-control" placeholder="Meta Description">
								</div><hr>
								<div class="from-group">
									<label for="">Ảnh</label>
									<div class="row">
										<div class="col-md-2">
											<img id="show_img" class="img-responsive center-block" height="100" width="100" src="/admin_assets/upload/images/new/none.jpg" alt="none image">
										</div>
										<div class="col-md-6">
											<input onchange="readURL(this);" style="margin-top: 30px" type="file" name="img_new">
										</div>
									</div>
								</div><hr>
								<div class="form-group">
									<label for="">Trạng thái</label>
									<input type="radio" value="1" name="rdStatus" checked="">Actived
									<input type="radio" value="0" name="rdStatus">Blocked
								</div>
							</div>	
						</div>
					</div>
					<div class="panel-footer">
						<button id="show" class="btn btn-default">Xem trước</button>
						<button id="create" class="btn btn-default">Tạo mới</button>
						<button id="draft" class="btn btn-default">Lưu nháp</button>
						<a href="/admin" class="btn btn-default">Hủy bỏ</a>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="/admin_assets/component_brower/ckeditor/ckeditor.js"></script>
	<script>
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#show_img')
	                    .attr('src', e.target.result)
	                    .width(100)
	                    .height(100);
	            };

	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	</script>
	<script src="/admin_assets/js/validate/createNewController.js"></script>
@endsection