@extends('admin.layouts.master')

@section('title')
	Quản lý	các đề tài nghiên cứu khoa học
@endsection

@section('content')
	<div class="row">
		<div class="col-md-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="{{ route('create_sciencestudy') }}">Thêm mới đề tài</a><hr>
					<a href="{{ route('manager_sciencestudy') }}">Danh sách đề tài</a><hr>
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{ route('create_sciencestudy') }}" class="btn btn-default">Thêm mới</a>
					<a href="#" id="btn-delete-multi" class="btn btn-default">Xóa nhiều đề tài</a>
				</div>
				<div class="panel-body">
					@if(count($sciencestudys) > 0)
						<table class="table">
							<thead>
								<th>STT</th>
								<th>
									<input type="checkbox" name="all" id="check_all">
								</th>
								<th>Mã ĐT</th>
								<th>Mã đề tài</th>
								<th>Tên đề tài</th>
								<th>Tác gia</th>
								<th>Bắt đầu</th>
								<th>Kết thúc</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</thead>
							<tbody>
								<?php $i=1; ?>
								@foreach($sciencestudys as $item)
									<tr>
										<td><?php echo $i++; ?></td>
										<td>
											<input type="checkbox" value="{{$item->id}}" name="data[]" id="data">
										</td>
										<td>
											{{$item->id}}
										</td>
										<td>
											{{$item->sciencestudy_id}}
										</td>
										<td>
											{{$item->name}}
										</td>
										<td>
											{{$item->author}}
										</td>
										<td>
											<?php
												$begin =strtotime($item->begin);
												echo date('Y',$begin); 
											?>
										</td>
										<td>
											<?php
												$end =strtotime($item->end);
												echo date('Y',$end); 
											?>
										</td>
										<td>
											<a href="/admin/sciencestudy/edit/{{$item->id}}">
												<i class="fa fa-pencil"></i>
											</a>
										</td>
										<td>
											<a id="delete" data-id="{{$item->id}}" data-name="{{$item->name}}" href="#">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@else
						<h3 class="text-center">Không có đề tài nào trong hệ thống.</h3>
						<h4 class="text-center">Vui lòng thêm đề tài mới <a href="{{ route('create_sciencestudy') }}"> tại đây.</a></h4>
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
					title:"Xóa nhiều đề tài",
					message:"Bạn có muốn xóa những đề tài đã được chọn không ???",
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
						    $.get("/admin/sciencestudy/delete/multi/"+vals);
						    location.reload();
						}
					}
				});
			});

			$('#check_all').off('click').on('click',function(){
				$(':checkbox').not(this).prop('checked',this.checked);
			});

			$('#delete').off('click').on('click',function(e){
				e.preventDefault();
				var id = $(this).data('id');
				var name = $(this).data('name');
				bootbox.confirm({
					title:"<b>Xóa đề tài khoa học</b>",
					message:"- Bạn có muốn xóa đề tài : <b>"+name+"</b> khỏi hệ thống ??? <br><br>-Thao tác không thể phục hồi bạn có muốn tiếp tục.",
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
							$.get('/admin/sciencestudy/delete/'+id);
							location.reload();
						}
					}
				});
			});
		});
	</script>
@endsection