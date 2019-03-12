@extends('admin.template.main')
@section('title', 'Listado de categorias')
@section('content')
	

	<a href="{{ route('admin.categories.create') }}" class="btn btn-primary pull-right">Registrar Categoria</a>
	<br><br>

	<table class="table table-bordered">
		<thead>
			<tr>	
				<th>ID</th>
				<th>Nombre</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>
					<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">
						<span class="glyphicon glyphicon-pencil"> </span>
					</a>
					<a href="{{ route('admin.categories.destroy', $category->id)}}" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminarlo')">
						<span class="glyphicon glyphicon-trash"> </span>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>	
	</table>
{!! $categories->render() !!}
@endsection