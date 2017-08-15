@extends('admin.layouts.master')

@section('title')
	Quản lý	 Bộ môn - Ban - Phòng
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ route('create_subject') }}">Thêm mới bộ môn-Ban-Phòng</a><hr>
					<a href="{{ route('manager_subject') }}">Danh sách BM-B-P</a><hr>
					<a href="{{ route('trash_subject') }}">BM-B-P đã xóa <span class="badge">{{$num_trash_subject}}</span></a><hr>
					<a href="#">Tìm kiếm BM-B-P </a><hr>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('create_subject') }}" class="btn btn-default">Thêm mới</a>
					<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa</a>
				</div>
				<div class="panel-body">
					@if(count($subjects) > 0)
						<table class="table">
							<thead>
								<th>STT</th>
								<th>
									<input type="checkbox" name="all" id="check_all">
								</th>
								<th>Thuộc khoa</th>
								<th>Tên bộ môn - ban - ngành</th>
								<th>Mô tả</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($subjects as $item)
									<tr>
										<td><?php echo $i++; ?></td>
										<td>
											<input type="checkbox" value="{{$item->id}}" name="data[]" id="data">
										</td>
										<td>
											<?php
												$faculty = App\Faculty::find($item->facultyID);
												if(count($faculty) > 0)
												{
													echo $faculty->name;
												}
												else
												{
													echo "Đang cập nhật";
												}
											?>
										</td>
										<td>
											{{$item->name}}
										</td>
										<td>
											{{$item->desc == "" ? "Đang cập nhật" : $item->desc}}
										</td>
										<td>
											<a href="/admin/subject/edit/{{$item->id}}">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
										<td>
											<a href="/admin/subject/delete/{{$item->id}}">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<h3 class="text-center">Không có BM-B-P nào trong hệ thống.</h3>
						<h4 class="text-center">Vui lòng thêm BM-B-P mới <a href="{{ route('create_subject') }}"> tại đây.</a></h4>
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
					title:"Xóa nhiều BM-B-P",
					message:"Bạn có muốn xóa những BM-B-P đã được chọn không ???",
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
						    $.get("/admin/subject/delete/multi/"+vals);
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