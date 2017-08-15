@extends('admin.layouts.master')

@section('title')
	Danh sách tin đang soạn
@endsection

@section('content')
	<div class="row">
		@include('admin.includes.slidebar')
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="/admin/new/create" class="btn btn-default">Tạo tin mới</a>
					<a href="#" class="btn btn-default">Xóa nhiều tin</a>
				</div>
				<div class="panel-body">
					@if(count($draft_list) > 0)
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Chọn chuyên mục tin</label>
									@if(count($categories) > 0)
										<select name="" id="" class="form-control">
											@foreach($categories as $cate)
												<option value="{{$cate->id}}">{{$cate->name}}</option>
											@endforeach
										</select>
									@else
										<h3>Hệ thống không có chuyên mục. Thêm mới chuyên mục <a href="/admin/categories/create">tại đây</a></h3>
									@endif
								</div>
							</div>
							<div class="col-md-12">
								<h3 for="">Danh danh sách tin đang soạn : </h3>
								<table class="table">
									<thead>
										<th>STT</th>
										<th><input type="checkbox" name="all" id="ck_all"></th>
										<th>ID</th>
										<th>Chuyên mục</th>
										<th>Tiêu đề</th>
										<th>Ngày đăng</th>
										<th>Trạng thái</th>
										<th>Lịch sử</th>
										<th>Xem</th>
										<th>Sửa</th>
										<th>Xóa</th>
									</thead>
									<tbody>
										<?php $d = 1;?>
										@foreach($draft_list as $item)
											<tr>
												<td><?php echo $d++; ?></td>
												<td><input type="checkbox" id="ck_{{$item->id}}"></td>
												<td>{{$item->id}}</td>
												<td>
													<?php
														$cate = App\Category::find($item->cate_id);
														echo $cate->name;
													 ?>
												</td>
												<td>{{$item->name}}</td>
												<td>{{date_format($item->created_at,"d-m-Y")}}</td>
												<td>
													{!!$item->status > 0 ? "<a href=\"#\">Actived</a>" : "<a href=\"#\">Blocked</a>" !!}
												</td>
												<td align="center">
													<a href="/admin/new/history/{{$item->id}}">
														<i class="fa fa-clock-o"></i>
													</a>
												</td>
												<td align="center">
													<a href="/admin/new/{{$item->id}}">
														<i class="fa fa-search"></i>
													</a>
												</td>
												<td align="center">
													<a href="/admin/new/edit/{{$item->id}}">
														<i class="fa fa-pencil"></i>
													</a>
												</td>
												<td align="center">
													<a href="/admin/new/draft/delete/{{$item->id}}">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					@else
						<h3 class="text-center"><i class="text-primary fa fa-terminal fa-5x"></i></h3>
						<h3 class="text-center">Hệ thống không có tin đang soạn</h3>
						<h4 class="text-center">Vui lòng đăng tin mới <a href="/admn/new/create">tại đây </a><h4/>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){
			$('#ck_all').off('click').on('click',function(){
				$('input:checkbox').not(this).prop('checked',this.checked);
			});
		});
	</script>
@endsection