@extends('admin.template.main')
@section('title','login')
@section('content')

{!! Form::open(['route' => 'admin.auth.login', 'metho' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('email','Correo') !!}	
		{!! Form::email('email',null, ['class' => 'form-control','placeholder' => 'example@gmail.com', 'required']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password','Contraseña') !!}
		{!! Form::password('password', ['class' => 'form-control','placeholder' => '***********', 'required']) !!}
		
	</div>
	<div class="form-group">
		{!! Form::submit('Acceder',['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@endsection()