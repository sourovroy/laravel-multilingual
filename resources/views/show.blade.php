@extends('layouts')

@section('content')

<div class="row  justify-content-md-center">

	<div class="col-8">
		<div class="blog-post">
			<h2>{{ $post->title }}</h2>
			<p>{{ $post->content }}</p>
		</div>
	</div>

</div>
<!--/row-->

@endsection