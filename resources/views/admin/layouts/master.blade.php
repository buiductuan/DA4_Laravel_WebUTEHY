<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		@include('admin.includes.css')
	</head>
	<body>
		@include('admin.includes.header')
		<div class="container-fluid" style="margin-top: 80px">

			@yield('content')

			@include('admin.includes.js')

			@yield('scripts')
		</div>
	</body>
</html>