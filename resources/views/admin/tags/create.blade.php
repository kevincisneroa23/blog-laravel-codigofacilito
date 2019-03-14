@extends('admin.template.main')
@section('title', 'Crear Tag')
@section('content')

{!! Form::open(['route' => 'admin.tags.store', 'method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la etiqueta', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@endsection()