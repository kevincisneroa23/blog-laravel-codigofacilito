@extends('front.template.main')
@section('title', 'Home')
@section('content')
<div class="pull-right">
	@if(Auth::user())
        <a  href="{{ route('admin.auth.logout') }}" class="label label-danger"> Salir Sesion </a>
	@else
    	<a  href="{{ route('admin.auth.login') }}" class="label label-primary"> Iniciar Sesion </a>
    @endif
</div>
<br>
<h3> {{ trans('app.title_last_articles') }} </h3>
<h5> {{ trans('app.test', ['name' => 'Kevin', 'company' => 'CodigoFacilito']) }}</h5>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			@foreach($articles as $article)
			<div class="col-md-6 ">
				<div class="panel">
					<div class="panel-body box-article">
						<a href="{{ route('front.view.article', $article->id) }}" >
							@foreach($article->images as $image)
							<img src="{{ asset('images/articles/'.$image->name) }}" class="img-responsive img-article" alt="....">
							@endforeach

						</a>
						<h3 class=" text-center"><a href="{{ route('front.view.article', $article->id) }}">{{ $article->title }}</a></h3>
						<hr>						
							<i class="glyphicon glyphicon-folder-open "></i>&nbsp;&nbsp;
							<a href="{{ route('front.search.category', $article->category->name) }}">
								{{ $article->category->name }}
							</a> 
						<div class="pull-right">
							<i class="glyphicon glyphicon-time"></i> 
							{{ $article->created_at->diffForHumans() }}
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