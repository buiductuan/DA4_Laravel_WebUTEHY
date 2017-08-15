<div class="col-md-2">
	<div class="panel panel-default">
		<div class="panel-body">
			<a href="/admin/new/create" class="text-center">Đăng tin mới</a><hr>
			<a href="{{route('get_draft')}}" class="text-center">
				Tin đang soạn <span class="badge pull-right">{{count($num_dr_new)}}</span>
			</a><hr>
			<a href="/admin/new/browse" class="text-center">
				Tin chờ duyệt <span class="badge pull-right">{{count($num_br_new)}}</span>
			</a><hr>
			<a href="/admin/new/publish" class="text-center">
				Tin chờ xuất bản <span class="badge pull-right">{{count($num_pl_new)}}</span></a><hr>
			<a href="/admin/new/trash" class="text-center">
				Tin đã xóa <span class="badge pull-right">{{count($num_trash_new)}}</span></a><hr>
			<a href="" class="text-center">Tìm kiếm bản tin</a>
		</div>
	</div>
</div>