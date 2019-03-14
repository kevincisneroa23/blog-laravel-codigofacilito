@extends('admin.template.main')
@section('title', 'Lista de Tags')
@section('content')

<a href="{{ route('admin.tags.create') }}" class="btn btn-primary pull-right"> Crear Etiqueta </a>

<!-- OPEN BUSCADOR DE TAGS-->
{!! Form::open(['route' => 'admin.tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-left']) !!}
	<div class="input-group">
		{!! Form::text('name', $search, [ 'class' => 'form-control ', 'placeholder' => 'Buscar tag...', 'aria-describedby' => 'search']) !!}
		<span class='input-group-btn' id="search">
			<button type="submit" class="btn btn-default">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
{!! Form::close() !!}
<!-- CLOSE BUSCADOR DE TAGS -->
<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tags as $tag)
		<tr>
			<td>{{ $tag->id }}</td>
			<td>{{ $tag->name }}</td>
			<td>
				<a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
				<a href="{{ route('admin.tags.destroy', $tag->id) }}" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminarlo')">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $tags->render()!!}

@endsection()