@extends('admin.layouts.master')

@section('title')
	Tìm kiếm tin tức
@endsection

@section('content')
	<div class="row">
		@include('admin.includes.slidebar')
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="btn btn-default" href="{{ route('get_create_new') }}">Tạo tin mới</a>
				</div>
				<div class="panel-body">
					<form action="/admin/new/search" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="row">
							<div class="col-md-5">
								<span>Tìm theo</span>&nbsp;&nbsp;&nbsp;
								<input type="radio" data-value="0" value="0" name="rdSearch" {{$rdSearch == 0 ? "checked" : ""}}> Mã tin
								&nbsp;&nbsp;
								<input type="radio" data-value="1" {{$rdSearch == 1 ? "checked" : ""}} value="1" name="rdSearch"> Tiêu đề tin
								<br><br>
 								<div class="input-group">
							      <input type="text" required=""  value="{{$keyword}}" id="keyword"  class="form-control" placeholder="Tìm kiếm" name="keyword">
							      <span class="input-group-btn">
							        <button type="submit" class="btn btn-default">Tìm kiếm</button>
							      </span>
							    </div>
							</div>
						</div><hr>
						<div class="row">
							<div class="container-fluid">
									<h4>Kết quả tìm kiếm : </h4><hr>
								@if(count($result_search) > 0)
									@if(count($result_search) == 1)
										 <a href="/admin/new/edit/{{$result_search->id}}">{{$result_search->name}}</a>
									@else
										@foreach($result_search as $item)
											- <a href="/admin/new/edit/{{$item->id}}">{!!str_replace($keyword,"<b style=\"color:black;\">$keyword</b>", $item->name)!!}</a> <hr>
										@endforeach
									@endif
								@else
									<h3 class="text-center">Không có kết quả nào phù hợp với nội dung được tìm kiếm.</h3>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(function(){
			$('input[type="radio"').click(function(){
				var i = $(this).data('value');
				
			});
		});
	</script>
@endsection