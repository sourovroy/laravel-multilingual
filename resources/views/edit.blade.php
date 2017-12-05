@extends('layouts')

@section('content')

<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="{{ route('posts.update', ['post' => $post]) }}" method="post">

			{{ csrf_field() }}
			{{ method_field('PATCH') }}

			<div class="form-group">
				<label for="title">@lang('content.Title')</label>
				<input type="text" class="form-control" id="title" name="title" value="{{$post->title }}">
			</div>

			<div class="form-group">
				<label for="content">@lang('content.Content')</label>
				<textarea class="form-control" id="content" rows="3" name="content">{{ $post->content }}</textarea>
			</div>

			@if($addLangPost)
				<input type="hidden" name="source_language_id" value="{{ $post->id }}">
			@endif

			<input type="hidden" name="language_code" value="{{ $current_local }}">

			<button class="btn btn-primary">@lang('content.Update')</button>
		</form>
	</div>
</div>
<!--/row-->

@endsection