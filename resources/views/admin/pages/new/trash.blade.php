@extends('admin.layouts.master')

@section('title')
	Danh sách tin đã xóa
@endsection

@section('content')
	<div class="row">
		@include('admin.includes.slidebar')
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="/admin/new/create" class="btn btn-default">Tạo tin mới</a>
					<button id="delete-multi-new" class="btn btn-default">Xóa nhiều tin</button>
				</div>
				<div class="panel-body">
					<div class="row">
					@if(count($trash_list) > 0)
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Chọn chuyên mục tin</label>
								@if(count($categories) > 0)
									<select name="" id="" class="form-control">
										@foreach($categories as $cate)
											<option value="{{$cate->id}}">{{$cate->name}}</option>
										@endforeach
									</select><hr>
								@else
									<h3>Hệ thống không có chuyên mục. Thêm mới chuyên mục<a href="/admin/categories/create"> tại đây</a></h3>
								@endif
							</div>
						</div>
						<div class="col-md-12">
							<h3 for="">Danh sách tin đã xóa : </h3><hr>
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
									@foreach($trash_list as $item)
										<tr>
											<td><?php echo $d++; ?></td>
											<td><input type="checkbox" value="{{$item->id}}" name="data[]" id="data"></td>
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
												<a href="/admin/new/permanently/delete/{{$item->id}}">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@else
						<h3 class="text-center"> Không có tin nào đã xóa</h3>
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){

			$('#delete-multi-new').off('click').on('click',function(){
				bootbox.confirm({
					title:"<h4>Xóa tin tức</h4>",
					message:"Bạn có muốn xóa vĩnh viễn những tin tức đã chọn ???. Thao tác không thể phục hồi.",
					buttons:{
						confirm:{
							label:"Yes",
							className:"btn-danger"
						},
						cancel: {
							label:"No",
							className:"btn-default"
						}
					},
					callback:function(result){
						if(result){
							var inputs = $("input[type='checkbox']");
							var vals = [];
							for(var i = 0 ; i < inputs.length; i++)
							{
								var type = inputs[i].getAttribute("type");
								if(type=="checkbox")
								{
									if(inputs[i].id == "data" && inputs[i].checked)
									{
										vals.push(inputs[i].value);
									}
								}
							}
							$.get('/admin/new/permanently/delete/multi/'+vals);
							location.reload();
						}
					}

				});
			});

			$('#ck_all').off('click').on('click',function(){
				$('input:checkbox').prop('checked',this.checked);
			});
		});
	</script>
@endsection