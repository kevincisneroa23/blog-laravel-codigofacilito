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
		{!! Form::select('category_id',$categories, null, ['class' => 'form-control select-category', 'placeholder' => 'Seleccione una cateoria...','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content', null, ['class' => 'form-control textarea-content','required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tags','Etiquetas') !!}
		{!! Form::select('tags[]',$tags, null, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
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

@section('js')
	<script type="text/javascript">
		/* Plugin Chosen para los Select Personalizados*/
		$('.select-tag').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
			max_selected_options: 3,
			no_results_text: 'No se encontro el tag'
		});
		$('.select-category').chosen({
			placeholder_text_multiple: 'Seleccione una categoria'
		});

		/* Plugin Trumbowyg para cajas de textos largos */
		$('.textarea-content').trumbowyg();


	</script>
@endsection