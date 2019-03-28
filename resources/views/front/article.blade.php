@extends('front.template.main')
@section('title', 'Home')
@section('content')

<h3> <u>Articulo: {{ $article->title }} </u></h3>

<div class="row">
	<div class="col-md-8">

		<div id="fondo_article">
			{!! $article->content !!}
		</div>

		<div class="row">
			<div class="col-md-6">
				<h4>Categoria: 
					<small>{{ $article->category->name }}</small>
				</h4>
			</div>
			<div class="col-md-6">
				<h4>Etiquetas
				@foreach($article->tags as $tag)
					<span class="label label-default">
						{{ $tag->name }}
					</span>&nbsp;
				@endforeach
				</h4>
			</div>
		</div>

		<h4>Comentarios</h4>
		<div id="comentarios_articles">
			
		</div>

	</div><!--col-8-->
	
	<div class="col-md-4 aside">
		@include('front.partials.aside')
	</div><!--col-4-->
</div><!--row-->

@endsection()