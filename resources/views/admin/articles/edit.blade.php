@extends('admin.template.main')
@section('title', 'Editar Articulo')
@section('content')
	{!! @Form::open(['route' => ['admin.articles.update', $article], 'method' => 'PUT']) !!}

	<div class="form-group">
		{!! Form::label('title','Titulo') !!}
		{!! Form::text('title', $article->title, ['class' => 'form-control ', 'placeholder' => 'Ingrese titulo', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Categoria') !!}
		{!! Form::select('category_id', $categories , $article->category_id , ['class' => 'form-control select-category', 'placeholder' => 'Ingrese categoria', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content', $article->content, ['class' => 'form-control textarea-content', 'placeholder' => 'Ingrese contenido', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tags','Etiquetas') !!}
		{!! Form::select('tags[]', $tags , $my_tags , ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

	</div>

	{!! @Form::close() !!}
@endsection()

@section('js')
	<script type="text/javascript">
		/* Plugin Chosen para los Select Personalizados*/
		$('.select-category').chosen({
			placeholder_text_multiple: 'Seleccione una categoria'
		});
		

		$('.select-tag').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
			max_selected_options: 3,
			no_results_text: 'No se encontro el tag'
			});
		/* Plugin Trumbowyg para cajas de textos largos */
		$('.textarea-content').trumbowyg();
	</script>

@endsection

