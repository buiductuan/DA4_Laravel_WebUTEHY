@extends('admin.layouts.master')

@section('title')
	Quản lý	cán bộ
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ route('create_employee') }}">Thêm mới cán bộ</a><hr>
					<a href="{{ route('manager_employee') }}">Danh sách cán bộ</a><hr>
					<a href="{{ route('trash_employee') }}">Cán bộ đã xóa <span class="badge">{{$num_trash_employee}}</span></a><hr>
					<a href="#">Tìm kiếm cán bộ </a><hr>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('create_employee') }}" class="btn btn-default">Thêm mới</a>
					<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa</a>
				</div>
				<div class="panel-body">
					@if(count($employees) > 0)
						<table class="table">
							<thead>
								<th>STT</th>
								<th>
									<input type="checkbox" name="all" id="check_all">
								</th>
								<th>Họ và tên</th>
								<th>Giới tính</th>
								<th>Ngày sinh</th>
								<th>Chức vụ</th>
								<th>Trình độ</th>
								<th>Email</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($employees as $item)
									<tr>
										<td><?php echo $i++; ?></td>
										<td>
											<input type="checkbox" value="{{$item->id}}" name="data[]" id="data">
										</td>
										<td>
											{{ $item->fullname." ".$item->name}}
										</td>
										<td>
											{{$item->gender == 0 ? "Nam" : "Nữ"}}
										</td>
										<td>
											<?php
												$dob = strtotime($item->dob);
												echo date("d-m-Y",$dob);
											?>
										</td>
										<td>
											{{$item->department == "" ? "Đang cập nhật" : $item->department }}
										</td>
										<td>
											{{$item->education }}
										</td>
										<td>
											{{$item->email}}
										</td>
										<td>
											<a href="/admin/employee/edit/{{$item->id}}">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
										<td>
											<a href="/admin/employee/delete/{{$item->id}}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<h3 class="text-center">Không có cán bộ nào trong hệ thống.</h3>
						<h4 class="text-center">Vui lòng thêm cán bộ mới <a href="{{ route('create_employee') }}"> tại đây.</a></h4>
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
					title:"Xóa nhiều cán bộ",
					message:"Bạn có muốn xóa những cán bộ đã được chọn không ???",
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
						    $.get("/admin/employee/delete/multi/"+vals);
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