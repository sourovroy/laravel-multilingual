@extends('layouts')

@section('content')

<div class="row  justify-content-md-center">

	@foreach($posts as $post)
	<div class="col-8">
		<div class="blog-post">
			<h2>{{ $post->title }}</h2>
			<p>{{ $post->content }}</p>
			<div>
				<a class="btn btn-secondary" href="{{ route('posts.show', ['post' => $post->id]) }}" role="button">
					View details &raquo;
				</a>
			</div>
		</div>
	</div>
	@endforeach

</div>
<!--/row-->

@endsection