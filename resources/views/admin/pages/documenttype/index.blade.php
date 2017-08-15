@extends('admin.layouts.master')

@section('title')
	Quản lý loại tài liệu
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ route('create_documenttype') }}">Thêm loại tài liệu</a><hr>
					<a href="{{ route('manager_documenttype') }}">Danh sách loại tài liệu</a><hr>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('create_documenttype') }}" class="btn btn-default">Thêm mới</a>
					<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa nhiều</a>
				</div>
				<div class="panel-body">
					@if(count($documenttypes) > 0)
						<table class="table">
							<thead>
								<th>STT</th>
								<th>
									<input type="checkbox" name="all" id="check_all">
								</th>
								<th>Mã loại tài liệu</th>
								<th>Tên</th>
								<th>Trạng thái</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($documenttypes as $item)
									<tr>
										<td><?php echo $i++; ?></td>
										<td>
											<input type="checkbox" value="{{$item->id}}" name="data[]" id="data">
										</td>
										<td>
											{{$item->id}}
										</td>
										<td>
											{{$item->name}}
										</td>
										<td>
											{!!$item->status == 1 ? "<i class=\"fa fa-circle text-success\"></i>" : "<i class=\"fa fa-circle text-danger\"></i>"!!}
										</td>
										<td>
											<a href="/admin/documenttype/edit/{{$item->id}}">
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
						<h3 class="text-center">Không có loại tài liệu nào trong hệ thống.</h3>
						<h4 class="text-center">Vui lòng thêm loại tài liệu mới <a href="{{ route('create_documenttype') }}"> tại đây.</a></h4>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){

			$('#btn-delete-multi').off('click').on('click',function(e){
				e.preventDefault();

				bootbox.confirm({
					title:"Xóa nhiều loại tài liệu",
					message:"Bạn có muốn xóa những loại tài liệu đã được chọn không ???",
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
						    $.get("/admin/documenttype/delete/multi/"+vals);
						    location.reload();
						}
					}
				});
			});

			$('#check_all').off('click').on('click',function(){
				$(':checkbox').not(this).prop('checked',this.checked);
			});

			$.get('/admin/documenttype/ajax/allid',function(result){
				var arr = $.makeArray(result.split('#'));
				arr.pop(arr[arr.length-1]);
				for(var i = 0; i< arr.length;i++){
					$('#delete_'+arr[i]).off('click').on('click',function(e){
						e.preventDefault();	
						var id = $(this).data('id');
						var name = $(this).data('name');

						bootbox.confirm({
							title:"<b>Xóa loại tài liệu</b>",
							message:"- Bạn có muốn xóa loại tài liệu : <b>"+name+"</b> khỏi hệ thống ??? <br>"+
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
									$.get('/admin/documenttype/delete/'+id);
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