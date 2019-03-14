@extends('admin.template.main')
@section('title', 'Editar Usuario:'.$user->name)
@section('content')


{!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' =>'Nombre Completo', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email','Correo') !!}
		{!! Form::email('email', $user->email,  ['class' => 'form-control', 'placeholder' => 'example@email.com', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('type','Tipo') !!}
		{!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], $user->type, ['class' => 'form-control','required']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@endsection()