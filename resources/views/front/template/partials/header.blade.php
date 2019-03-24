<div class="pull-right">
	 @if(Auth::user())
        <a  href="{{ route('admin.auth.logout') }}" class="label label-danger"> Salir Sesion </a>
	@else
    	<a  href="{{ route('admin.auth.login') }}" class="label label-primary"> Iniciar Sesion </a>
    @endif
</div>
<br>
<div class="text-center" >
	<img src="{{ asset('images/logo.jpg') }}" class="img-responsive img-circle center-block" alt="...." width="200px" height="200px">
	<h1>Blog Facilito</h1>
	<h5 class="text-danger"> 
		<a href="http://www.codigofacilito.com" target="_blank">www.codigofacilito.com</a> | 
		<a href="http://www.twitter.com/_bycar" target="_blank">@_bycar</a> | 
		<a href="http://www.instagram.com/kevincisneroa23" target="_blank">@kevincisneroa23</a> 
	</h5>
</div>