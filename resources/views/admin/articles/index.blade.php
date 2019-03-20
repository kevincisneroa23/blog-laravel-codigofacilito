@extends('admin.template.main')
@section('title','Lista de Articulos')
@section('content')

<a href="{{ route('admin.articles.create') }}" class="btn btn-primary pull-right">Registrar Articulo</a>
<!-- OPEN BUSCADOR ARTICULOS -->
{!! Form::open(['route' => 'admin.articles.index', 'method' => 'get', 'class' => 'navbar-form pull-left']) !!}
	<div class="input-group">
		{!! Form::text('title', $search , ['class' => 'form-control', 'placeholder' => 'Buscar articulo', 'required', 'aria-describedby' => 'search']) !!}
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default" id="search">
				<span class="glyphicon glyphicon-search"></span>
			</button>
			<a href="{{ route('admin.articles.index') }}" class="btn btn-default">
				<span class="glyphicon glyphicon-erase"></span>
			</a>
		</span>
	</div>
{!! Form::close() !!}
<!-- CLOSE BUSCADOR ARTICULOS -->

<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>Usuario</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($articles as $article)
		<tr>
			<td>{{ $article->id }}</td>
			<td>{{ $article->title }}</td>
			<td>{{ $article->category->name }}</td>
			<td>{{ $article->user->name }}</td>
			<td>
				<a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-warning">
					<span class="glyphicon glyphicon-pencil"></span>
				</a>
				<a href="{{ route('admin.articles.destroy',$article->id) }}" class="btn btn-danger" onclick="return confirm('¿Esta seguro de eliminarlo?')">
					<span class="glyphicon glyphicon-trash"></span>
				</a>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $articles->render() !!}
@endsection()