@extends('admin.template.main')
@section('title', 'Administracion')
@section('content')
<h1>Bienvenidos al panel de administración</h1>
<hr>
<a href="{{ route('admin.articles.create') }}" class="btn btn-default">Crear nuevo articulo </a> 

<a href="{{ route('admin.tags.create') }}" class="btn btn-default">Crear nuevo tag</a>
@endsection()