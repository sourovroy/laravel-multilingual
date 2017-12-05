@extends('layouts')

@section('content')

<div class="row  justify-content-md-center">

	<div class="col-8">
		<div class="blog-post">
			<h2>{{ $post->title }}</h2>
			<p>{{ $post->content }}</p>

			@if($addLangPost)
			<div>
				<a class="btn btn-secondary" href="{{ route('posts.edit', ['post' => $post]) }}">{{ sprintf(__('content.Add%sConetnt'), LaravelLocalization::getCurrentLocaleName()) }}</a>
			</div>
			@else
			<div>
				<a class="btn btn-secondary" href="{{ route('posts.edit', ['post' => $post]) }}">@lang('content.EditPost')</a>
			</div>
			@endif

		</div>
	</div>

</div>
<!--/row-->

@endsection