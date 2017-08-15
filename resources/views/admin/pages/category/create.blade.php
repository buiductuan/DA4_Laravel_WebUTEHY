@extends('admin.layouts.master')

@section('title')
	Danh sách chuyên mục tin tức
@endsection

@section('content')
	<form action="/admin/category/create" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="user_id" value="{{$auth->id}}">
						<a href="/admin/category/create" class="text-center">Tạo chuyên mục mới</a><hr>
						<a href="/admin/category/trash" class="text-center">
							Chuyên mục đã xóa <span class="badge pull-right">{{$num_trash_category}}</span></a><hr>
						<a href="/admin/category" class="text-center">Danh sách chuyên mục</a><hr>
						<a href="" class="text-center">Tìm kiếm chuyên mục</a>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<button type="submit" class="btn btn-default">Tạo mới</button>
							<a href="/admin/category" class="btn btn-default">Hủy bỏ</a>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										@if(count($cateParents) > 0)
											<label for="">Chuyên mục cha</label>
											<select name="cate_parent" class="form-control">
												<option value="0">-- Chọn chuyên mục cha --</option>
												@foreach($cateParents as $item)
													<option value="{{$item->id}}">{{$item->name}}</option>
												@endforeach
											</select>
										@endif
									</div>
									
								</div>
								<div class="col-md-8">
									<br>
									@if(count($errors) > 0)
										@foreach($errors->all() as $err)
											<div class="alert alert-danger">
												 - {{$err}}
											</div>
										@endforeach
									@endif
								</div>
							</div><hr>
							<div class="form-group">
								<label for="">Tên chuyên mục</label>
								<input type="text" placeholder="Tên chuyên mục" title="Tên chuyên mục" name="cateName" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Mô tả</label>
								<textarea name="cateDesc" class="ckeditor" id="demo"></textarea>
							</div>
							<div class="form-group">
								<label for="">Meta key</label>
								<input type="text" name="meta_key" class="form-control" placeholder="Meta keyword để giúp cho tin tức dễ dàng được tối ưu SEO trên các công cụ tìm kiếm">
							</div>
							<div class="form-group">
								<label for="">Meta Description</label>
								<input type="text" name="meta_desc" class="form-control" placeholder="Meta Description để giúp cho tin tức dễ dàng được tối ưu SEO trên các công cụ tìm kiếm">
							</div><hr>
							<div class="form-group">
								<label for="">Ảnh</label>
								<div class="row">
									<div class="col-md-2">
										<img id="show_img" class="img-responsive center-block" height="100" width="100" src="/admin_assets/upload/images/new/none.jpg" alt="none image">
									</div>
									<div class="col-md-6">
										<input onchange="readURL(this);" style="margin-top: 30px" type="file" name="img_category">
									</div>
								</div>
							</div><hr>
							<div class="form-group">
								<label for="">Trạng thái</label>
								<input type="radio" value="1" name="rdStatus" checked="">Actived
								<input type="radio" value="0" name="rdStatus">Blocked
							</div>
							<div class="form-group">
								<label for="">Hiển thị trên menu</label>
								<input type="radio" value="1" name="rdShowNav">Yes
								<input type="radio" value="0" name="rdShowNav" checked="">No
							</div>
							<div class="form-group">
								<label for="">Hiển thị trên trang chủ</label>
								<input type="radio" value="1" name="rdShowContent">Yes
								<input type="radio" value="0" name="rdShowContent" checked="">No
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-default">Tạo mới</button>
							<a href="/admin/category" class="btn btn-default">Hủy bỏ</a>
						</div>
					</div>
			</div>
		</div>
	</form>
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
@endsection