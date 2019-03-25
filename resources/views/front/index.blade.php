@extends('front.template.main')
@section('title', 'Home')
@section('content')


<h3>Ultimos Articulos </h3>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			@foreach($articles as $article)
			<div class="col-md-6">
				<div class="panel panel-error">
					<div class="panel panel-body">
						<a href="#" class="thumbnail">
							@foreach($article->images as $image)
							<img src="{{ asset('images/articles/'.$image->name) }}" class="img-responsive" alt="....">
							@endforeach

						</a>
						<h3 class="text-center">{{ $article->title }}</h3>
						<hr>						
						<i class="glyphicon glyphicon-folder-open "></i>&nbsp;&nbsp;<a href="#">{{ $article->category->name }}</a>
						<div class="pull-right">
							<i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }}
						</div>
					</div>
				</div>
			</div><!--col-6-->
			@endforeach
		{!! $articles->render() !!}
		</div><!--row-->
	</div><!--col-8-->

	<div class="col-md-4 aside">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Categorias</h3>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<li class="list-group-item">
						<span class="badge">14</span> Noticias
					</li>
					<li class="list-group-item">
						<span class="badge">10</span> Programacion
					</li>
					<li class="list-group-item">
						<span class="badge">5</span> Tips
					</li>
				</ul>
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tags</h3>
			</div>
			<div class="panel-body">
				
				<span class="label label-default">Default</span>
				<span class="label label-default">Default</span>
				<span class="label label-default">Default</span>
				<span class="label label-default">Default</span>
				<span class="label label-default">Default</span>
			</div>
		</div>
	</div><!--col-4-->
</div><!--row-->
@endsection()