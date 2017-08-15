@extends('admin.layouts.master')

@section('title')
	Khoa đã xóa
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ route('create_faculty') }}">Thêm mới khoa</a><hr>
					<a href="{{ route('manager_faculty') }}">Danh sách khoa</a><hr>
					<a href="{{ route('trash_faculty') }}">Khoa đã xóa <span class="badge">{{$num_trash_faculty}}</span></a><hr>
					<a href="#">Tìm kiếm khoa </a><hr>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('create_faculty') }}" class="btn btn-default">Thêm mới</a>
					<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa</a>
				</div>
				<div class="panel-body">
					@if(count($faculties_trash) > 0)
						<h3>Danh sách Khoa đã xóa : </h3><hr>
						<table class="table">
							<thead>
								<th>STT</th>
								<th>
									<input type="checkbox" name="all" id="check_all">
								</th>
								<th>Mã Khoa</th>
								<th>Tên Khoa</th>
								<th>Mô tả</th>
								<th>Số điện thoại</th>
								<th>Website</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($faculties_trash as $item)
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
											{{$item->desc == "" ? "Đang cập nhật" : $item->desc}}
										</td>
										<td>
											{{$item->phone}}
										</td>
										<td>
											<a target="_blank" href="{{$item->link}}">{{$item->website}}</a>
										</td>
										<td>
											<a href="/admin/faculty/edit/{{$item->id}}">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
										<td>
											<a href="/admin/faculty/permanently/delete/{{$item->id}}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<h3 class="text-center">Không có Khoa nào đã xóa.</h3>
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
					title:"Xóa nhiều Khoa",
					message:"Bạn có muốn xóa những Khoa đã được chọn không ???",
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
						    $.get("/admin/faculty/permanently/delete/multi/"+vals);
						    location.reload();
						}
					}
				});
			});

			$('#check_all').off('click').on('click',function(){
				$(':checkbox').not(this).prop('checked',this.checked);
			});
		});
	</script>
@endsection