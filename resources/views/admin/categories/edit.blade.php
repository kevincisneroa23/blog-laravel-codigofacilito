@extends('admin.template.main')
@section('title', 'Editar de categoria: '.$category->name)
@section('content')
{!! Form::open(['route' => ['admin.categories.update', $category->id], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('name', 'Nombre') !!}
		{!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de categoria', 'required']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
	</div>
		
{!! Form::close() !!}
@endsection	