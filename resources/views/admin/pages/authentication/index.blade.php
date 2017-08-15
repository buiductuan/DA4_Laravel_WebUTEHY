<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login admin</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/admin_assets/component_brower/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		
		<form action="/auth/login" method="POST">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default" style="margin-top: 140px;">
						<div class="panel-heading">
							<h3 class="text-center">Login to Administrator</h3>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
						</div>
						<div class="panel-body">
							@if(count($errors) > 0)
								@foreach($errors->all() as $err)
									<div class="alert alert-danger">
										{{$err}}
									</div>
								@endforeach
								<hr>
							@endif
							@if(session('error_login'))
								<div class="alert alert-danger">
									{{session('error_login')}}
								</div><hr>
							@endif
							<div class="form-group">
								<input type="email" autofocus="" name="email" placeholder="Email" required="" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="Password" required="" class="form-control">
							</div><hr>
							<button type="submit" class="btn btn-success pull-right">Login</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<!-- jQuery -->
		<script src="/admin_assets/component_brower/jquery/jquery-1.12.4.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/admin_assets/component_brower/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>