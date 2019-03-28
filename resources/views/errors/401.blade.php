<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Error') 401 </title>
	<link rel="stylesheet" href="{{ asset('css/general.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
</head>
<body>
	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			<br><br>
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="text-center">Acceso Restringido</div>
				</div><!--heading-->
				<div class="panel-body">
					<img class="img-responsive center-block" src="{{ asset('images/error_acceso.png')}}">
					<hr>
					<strong class="text-center">
						<p class="text-center">
							Usted no tiene acceso a esta zona
						</p>
						<p>
							<a href="{{ route('front.index') }}">¿Desea volver al inicio?</a>
						</p>
					</strong>
				</div><!--body-->
			</div><!--panel-->
		</div><!--col-->
	</div><!--container-->
	<!--<footer>
		<hr>
		Todos los derechos reservados <span class="glyphicon glyphicon-copyright-mark"></span> 2015 
		<div class="pull-right">Codigo Facilito</div>
	</footer>
-->
	<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	@yield('js')
</body>
</html>