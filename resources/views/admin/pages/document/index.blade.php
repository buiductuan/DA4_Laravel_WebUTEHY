@extends('admin.layouts.master')

@section('title')
	Quản lý văn bản
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ route('create_document') }}">Thêm văn bản</a><hr>
					<a href="{{ route('manager_document') }}">Danh sách văn bản</a><hr>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('create_document') }}" class="btn btn-default">Thêm mới</a>
					<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa nhiều</a>
				</div>
				<div class="panel-body">
					@if(count($documents) > 0)
						<table class="table">
							<thead>
								<th>STT</th>
								<th>
									<input type="checkbox" name="all" id="check_all">
								</th>
								<th>Tên văn bản</th>
								<th>Đường dẫn</th>
								<th>Ngày tạo</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($documents as $item)
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
											<a href="/admin/document/edit/{{$item->id}}">
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
						<h3 class="text-center">Không có văn bản nào trong hệ thống.</h3>
						<h4 class="text-center">Vui lòng thêm văn bản mới <a href="{{ route('create_document') }}"> tại đây.</a></h4>
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

			$.get('/admin/document/ajax/allid',function(result){
				var arr = $.makeArray(result.split('#'));
				arr.pop(arr[arr.length-1]);
				for(var i = 0; i< arr.length;i++){
					$('#delete_'+arr[i]).off('click').on('click',function(e){
						e.preventDefault();	
						var id = $(this).data('id');
						var name = $(this).data('name');

						bootbox.confirm({
							title:"<b>Xóa văn bản</b>",
							message:"- Bạn có muốn xóa văn bản : <b>"+name+"</b> khỏi hệ thống ??? <br>"+
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
									$.get('/admin/document/delete/'+id);
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