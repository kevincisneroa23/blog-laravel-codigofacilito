<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Home') | Blog Facilito</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>
	<header>
		@include('front.template.partials.header')
	</header>

	<div class="container">
		@yield('content')
	</div>

	<footer>
		<hr>
		Todos los derechos reservados <span class="glyphicon glyphicon-copyright-mark"></span> 2015 
		<div class="pull-right">Codigo Facilito</div>
	</footer>
	

	<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	@yield('js')
</body>
</html>