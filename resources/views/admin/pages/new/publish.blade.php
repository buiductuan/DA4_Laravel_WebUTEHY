@extends('admin.layouts.master')

@section('title')
	Danh sách tin chờ xuất bản
@endsection

@section('content')
	<div class="row">
		@include('admin.includes.slidebar')
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{route('get_create_new')}}" class="btn btn-default">Đăng tin mới</a>
					<a href="#" id="btn-publish" class="btn btn-default hidden">Xuất bản</a>
					<a id="del-multi-news" href="/admin/new/create" class="btn btn-default">Xóa nhiều tin</a>
				</div>
				<div class="panel-body">
					<div class="row">
					@if(count($new_pl_list) > 0)
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
									<h3>Hệ thống chưa có chuyên mục. Thêm mới chuyên mục <a href="{{route('get_create_category')}}">tại đây</a></h3>
								@endif
							</div>
						</div>
						<div class="col-md-12">
							<h3 for="">Danh sách tin chờ xuất bản : </h3>
							<table class="table table-responsive">
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
									@foreach($new_pl_list as $item)
										<tr>
											<td><?php echo $d++; ?></td>
											<td><input type="checkbox" value="{{$item->id}}" id="data" name="data[]"></td>
											<td>{{$item->id}}</td>
											<td>
												<?php
													$cate = App\Category::find($item->cate_id);
													echo $cate->name;
												 ?>
											</td>
											<td>{{$item->name}}</td>
											<td>{{date_format($item->created_at,"d-m-Y")}}</td>
											<td align="center">
												{!!$item->status > 0 ? 
													"<a href=\"#\">
														<i class=\"fa fa-circle text-success\"></i>
													</a>" 
														:
												 	"<a href=\"#\">
														<i class=\"fa fa-circle text-danger\"></i>
												 	</a>" 
												 !!}
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
												<a href="/admin/new/delete/{{$item->id}}">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<hr>
						<ul class="pagination">
								{{$new_pl_list->links()}}
						</ul>
					@else
						<h3 class="text-center"><i class="fa fa-newspaper-o fa-5x"></i></h3>
						<h3 class="text-center">Hệ thống không có tin chờ xuất bản</h3>
						<h4 class="text-center">Vui lòng đăng tin mới <a href="/admn/new/create">tại đây </a><h4/>
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

			$('#del-multi-news').off('click').on('click',function(e){
				e.preventDefault();

				bootbox.confirm({
				    title: "Xóa tin tức ?",
				    message: "Bạn có muốn xóa những tin tức đã được chọn ???",
				    buttons: {
				        confirm: {
				            label: 'Yes',
				            className: 'btn-danger'
				        },
				        cancel: {
				            label: 'No',
				            className: 'btn-default'
				        }
				    },
				    callback: function (result) {
				        if(result)
				        {
				        	var inputs = $("input[type='checkbox']");
						    var vals=[];
						    
						    for(var i = 0; i < inputs.length; i++) 
						    { 
						        var type = inputs[i].getAttribute("type");
						        if(type == "checkbox") 
						        {
						            if(inputs[i].id=="data" && inputs[i].checked){
						                vals.push(inputs[i].value);
						            }
						        } 
						    }
						    $.get("/admin/new/delete/multi/"+vals);
						    location.reload();
				        }
				    }
				});
			});


			$("input[type='checkbox']").change(function(){
				$("input[type='checkbox']").each(function(){
					if(this.checked){
						$('#btn-publish').removeClass("hidden");
					}else{
						$('#btn-publish').addClass("hidden");
					}
				});
			});
	

			$('#btn-publish').off('click').on('click',function(e){
				e.preventDefault();

				bootbox.confirm({
					title:"<h4>Xuất bản tin tức</h4>",
					message:"<p>Bạn có muốn xuất bản những tin tức đã được chọn không ???</p>",
					buttons:{
						confirm:{
							label:"Yes",
							className:"btn-success"
						},
						cancel:{
							label:"No",
							className:"btn-default"
						}
					},
					callback:function(result){
						if(result){
							var vals = [];
							var inputs = $("input[type='checkbox']");

							for(var i = 0 ; i < inputs.length;i++)
							{
								var type = inputs[i].getAttribute("type");
								if(type=="checkbox"){
									if(inputs[i].id=="data" && inputs[i].checked){
										vals.push(inputs[i].value);
									}
								}
							}

							for(var i = 0 ; i < vals.length;i++)
							{
								if(vals[i] == "on"){
									vals.pop(vals[i]);
								}
							}
							$.get('/admin/new/publish/multi/'+vals);
							location.reload();
						}
					}
				});
			});

			$('#ck_all').off('click').on('click',function(){
				$('input:checkbox').not(this).prop('checked',this.checked);
			});
		});
	</script>
@endsection