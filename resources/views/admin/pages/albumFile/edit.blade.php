@extends('admin.layouts.master')

@section('title')
	Quản lý Album file
@endsection

@section('content')
	<form action="/admin/albumfile/edit/{{$album->id}}" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ route('manager_file') }}"> Quản lý file đính kèm</a><hr>
						<a href="{{ route('manager_album_file') }}">Quản lý Albums</a><hr>
						<a href="{{ route('manager_file') }}">Quản lý trạng thái</a><hr>
						<a href="{{ route('manager_file') }}">Quản lý Video</a><hr>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button type="submit" class="btn btn-default">Cập nhật</button>
						<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa nhiều</a>
						<input type="hidden" value="{{csrf_token()}}" name="_token">
					</div>
					<div class="panel-body">
						@if(count($errors) > 0)
							<div class="row">
								<div class="col-md-4">
									@foreach($errors->all() as $err)
										<div class="alert alert-danger">
											{{$err}}
										</div>
									@endforeach
								</div>
							</div>
						@endif
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Tên Album <small class="text-danger">(*)</small></label>
									<input type="text" value="{{$album->name}}" placeholder="Tên Album" name="name" class="form-control">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="">Sắp xếp</label>
									<input type="number" value="{{$album->orderBy}}" name="orderBy" class="form-control" placeholder="Sắp xếp">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<br><br>
									<label for="">Hiển thị</label>
									<input type="radio" value="1" {{$album->status > 0 ? "checked" : ""}} name="rdStatus"> Có
									<input type="radio" value="0" {{$album->status == 0 ? "checked" : ""}} name="rdStatus"> Không
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="">Ảnh</label>
								<input type="file" name="img">
							</div>
						</div>
						<hr>
						@if(count($albumfiles) > 0)
							<table class="table">
								<thead>
									<th>STT</th>
									<th>
										<input type="checkbox" name="all" id="check_all">
									</th>
									<th>Tên Album</th>
									<th>Ngày tạo</th>
									<th>Trạng thái</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</thead>
								<tbody>
									<?php $i=1; ?>
									@foreach($albumfiles as $item)
										<tr>
											<td><?php echo $i++; ?></td>
											<td>
												<input type="checkbox" value="{{$item->id}}" name="data[]" id="data">
											</td>
											<td>
												{{$item->name}}
											</td>
											<td>
												{{date_format($item->created_at,'d-m-Y')}}
											</td>
											<td>
												{!!
													$item->status == 0 ? 
													"<i class=\"fa fa-circle text-danger\"></i>" : "<i class=\"fa fa-circle text-success\"></i>"
												!!}
											</td>
											<td>
												<a href="/admin/albumfile/edit/{{$item->id}}">
													<i class="fa fa-pencil"></i>
												</a>
											</td>
											<td>
												<a id="delete_{{$item->id}}" data-id="{{$item->id}}" data-name="{{$item->name}}" href="#">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<h3 class="text-center">Không có Album file nào trong hệ thống.</h3>
						@endif
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection

@section('scripts')
	<script>
		$(function(){

			$('#btn-delete-multi').off('click').on('click',function(e){
				e.preventDefault();

				bootbox.confirm({
					title:"<b>Xóa nhiều album</b>",
					message:"Bạn có muốn xóa những văn bản đã được chọn không ???",
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
						    $.get("/admin/albumfile/delete/multi/"+vals);
						    location.reload();
						}
					}
				});
			});

			$('#check_all').off('click').on('click',function(){
				$(':checkbox').not(this).prop('checked',this.checked);
			});

			$.get('/admin/albumfile/ajax/allid',function(result){
				var arr = $.makeArray(result.split('#'));
				arr.pop(arr[arr.length-1]);
				for(var i = 0; i< arr.length;i++){
					$('#delete_'+arr[i]).off('click').on('click',function(e){
						e.preventDefault();	
						var id = $(this).data('id');
						var name = $(this).data('name');

						bootbox.confirm({
							title:"<b>Xóa văn bản</b>",
							message:"- Bạn có muốn xóa album : <b>"+name+"</b> khỏi hệ thống ??? <br>"+
							"- Thao tác không thể phục hồi bạn có muốn tiếp tục ???",
							buttons:{
								confirm:{
									label:'Yes',
									className:'btn-danger'
								},
								cancel:{
									label:'No',
									className:'btn-default'
								}
							},
							callback:function(result){
								if(result){
									$.get('/admin/albumfile/delete/'+id);
									location.reload();
								}
							}
						});
					});
				}
			});
			
		});
	</script>
@endsection