@extends('admin.template.main')
@section('title','Inicio')


@section('content')
    <h1>Bienvenido</h1>
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, aperiam corporis vero fugit cupiditate nam ut consequuntur asperiores laboriosam repudiandae enim quibusdam non beatae. Architecto quis reiciendis assumenda voluptatibus expedita.</p>
    <hr>
    @if(Auth::user())
        <a  href="{{ route('admin.auth.logout') }}" class="btn btn-success"> Salir Sesion </a>
	@else
    	<a  href="{{ route('admin.auth.login') }}" class="btn btn-success"> Iniciar Sesion </a>
    @endif
@endsection