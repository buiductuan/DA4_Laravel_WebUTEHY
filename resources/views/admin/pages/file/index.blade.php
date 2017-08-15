@extends('admin.layouts.master')

@section('title')
	Quản lý file đính kèm
@endsection

@section('content')
	<form action="/admin/file/create" method="POST" enctype="multipart/form-data">
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
						<button type="submit" class="btn btn-default">Thêm mới</button>
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
						@if(count($albums) > 0)
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<select name="sl_album" class="form-control">
											<option value="0">-- Chọn Album --</option>
											@foreach($albums as $al)
												<option value="{{$al->id}}">{{$al->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						@endif
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Tên file <small class="text-danger">(*)</small></label>
									<input type="text" placeholder="Tên file" name="name" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Đường dẫn</label>
									<input type="file" name="file">
								</div>
							</div>
						</div><hr>
						@if(count($files) > 0)
							<table class="table">
								<thead>
									<th>STT</th>
									<th>
										<input type="checkbox" name="all" id="check_all">
									</th>
									<th>Tên file</th>
									<th>Đường dẫn</th>
									<th>Ngày tạo</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</thead>
								<tbody>
									<?php $i=1; ?>
									@foreach($files as $item)
										<tr>
											<td><?php echo $i++; ?></td>
											<td>
												<input type="checkbox" value="{{$item->id}}" name="data[]" id="data">
											</td>
											<td>
												{{$item->name}}
											</td>
											<td>
												{{$item->link}}
											</td>
											<td>
												{{date_format($item->created_at,'d-m-Y')}}
											</td>
											<td>
												<a href="/admin/file/edit/{{$item->id}}">
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
							<h3 class="text-center">Không có file nào trong hệ thống.</h3>
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
					title:"Xóa nhiều văn bản",
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
						    $.get("/admin/document/delete/multi/"+vals);
						    location.reload();
						}
					}
				});
			});

			$('#check_all').off('click').on('click',function(){
				$(':checkbox').not(this).prop('checked',this.checked);
			});

			$.get('/admin/file/ajax/allid',function(result){
				var arr = $.makeArray(result.split('#'));
				arr.pop(arr[arr.length-1]);
				for(var i = 0; i< arr.length;i++){
					$('#delete_'+arr[i]).off('click').on('click',function(e){
						e.preventDefault();	
						var id = $(this).data('id');
						var name = $(this).data('name');

						bootbox.confirm({
							title:"<b>Xóa File</b>",
							message:"- Bạn có muốn xóa File : <b>"+name+"</b> khỏi hệ thống ??? <br>"+
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
									$.get('/admin/file/delete/'+id);
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