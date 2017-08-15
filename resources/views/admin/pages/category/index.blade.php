@extends('admin.layouts.master')

@section('title')
	Danh sách chuyên mục tin tức
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
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
					<a href="/admin/category/create" class="btn btn-default">Tạo chuyên mục mới</a>
					<a href="#" id="delete-multi" class="btn btn-default">Xóa nhiều chuyên mục</a>
				</div>
				<div class="panel-body">
					@if(count($category_list) > 0)
						<div class="row">
							<div class="col-md-6"><br>
								<h3>Danh sách chuyên mục : </h3>
							</div>
							<div class="col-md-6">
								<ul class="pagination pull-right">
									{{$category_list->links()}}
								</ul>
							</div>
						</div>
						<table class="table">
							<thead>
								<th>STT</th>
								<th><input type="checkbox" id="check_all"></th>
								<th>ID</th>
								<th>Parent</th>
								<th>Tên</th>
								<th>Ngày tạo</th>
								<th>Trạng thái</th>
								<th>Lịch sử</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								@foreach($category_list as $item)
									<tr>
										<td><?php echo $i++;?></td>
										<td>
											<input type="checkbox" id="data" name="data[]" value="{{$item->id}}">
										</td>
										<td>{{$item->id}}</td>
										<td>
											<?php 
												if($item->parentID == 0){
													echo "<i class=\"fa fa-times\"></i>";
												}else{
													$cate = App\Category::find($item->parentID);
													echo $cate->name;
												}
											?>
										</td>
										<td>
											<span class = "<?php if($item->parentID == 0) echo "text-success";  ?>" title="{{$item->name}}">{{$item->name}}</span>
										</td>
										<td>{{date_format($item->created_at,'d-m-Y')}}</td>
										<td>
											{!! $item->status > 0 ? 
												"<a id=\"status\" data-id={$item->id} href=\"#\"><i class=\"fa fa-circle text-success\"></i></a>" : 
												"<a id=\"status\" data-id={$item->id} href=\"#\"><i class=\"fa fa-circle text-danger\"></i></a>"
											!!}
										</td>
										<td>
											<a href="#">
												<i class="fa fa-clock-o"></i>
											</a>
										</td>
										<td>
											<a href="/admin/category/edit/{{$item->id}}">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
										<td>
											<a href="/admin/category/delete/{{$item->id}}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){

			$('#delete-multi').off('click').on('click',function(e){
				e.preventDefault();

				bootbox.confirm({
					title:"Xóa nhiều chuyên mục",
					message:"Bạn có muốn xóa những chuyên mục đã được chọn ???",
					buttons:{
						confirm:{
							label:"Yes",
							className:"btn-danger"
						},
						cancel:{
							label:"No",
							className:"btn-default"
						}
					},
					callback:function(result){
						if(result){
							var inputs = $('input[type="checkbox"]');
							var vals = [];

							for(var i = 0; i< inputs.length;i++){
								var type = inputs[i].getAttribute("type");
								if(type == "checkbox"){
									if(inputs[i].id="data" && inputs[i].checked){
										vals.push(inputs[i].value);
									}
								}
							}

							for(var i=0;i<vals.length;i++){
								if(vals[i] == "on"){
									vals.pop(vals[i]);
								}
							}

							$.get('/admin/category/delete/multi/'+vals);
							location.reload();
						}
					}
				});
			});

			$('#check_all').off('click').on('click',function(){
				$(':checkbox').not(this).prop('checked',this.checked);
			});

			$('#status').off('click').on('click',function(e){
				e.preventDefault();
			});
		});
	</script>
@endsection