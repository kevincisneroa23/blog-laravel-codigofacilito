@extends('admin.template.main')
@section('title','Registrar Articulo')
@section('content')

{!! Form::open(['route' => 'admin.articles.store', 'method' => 'POST', 'files' => true]) !!}
	<div class="form-group">
		{!! Form::label('title','Titulo') !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo del articulo', 'require']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Categoria') !!}
		{!! Form::select('category_id',$categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una cateoria...','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content', null, ['class' => 'form-control','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tags','Etiquetas') !!}
		{!! Form::select('tags[]',$tags, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una etiqueta...', 'multiple', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image','Imagen') !!}
		{!! Form::file('image') !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

@endsection()