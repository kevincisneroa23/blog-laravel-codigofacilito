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
						<i class="glyphicon glyphicon-folder-open "></i>&nbsp;&nbsp;
							<a href="{{ route('front.search.category', $article->category->name) }}">
							{{ $article->category->name }}
							</a> 
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
		@include('front.partials.aside')
	</div><!--col-4-->
</div><!--row-->
@endsection()