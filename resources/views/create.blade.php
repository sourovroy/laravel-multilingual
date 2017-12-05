@extends('layouts')

@section('content')

<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="/store" method="post">

			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">@lang('content.Title')</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>

			<div class="form-group">
				<label for="content">@lang('content.Content')</label>
				<textarea class="form-control" id="content" rows="3" name="content"></textarea>
			</div>

			<div class="form-group">
				<label>@lang('content.SelectLanguage')</label>
				<select class="form-control" name="language_code">					
					@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
						<option value="{{ $localeCode }}" {{ ($localeCode == $current_local) ? 'selected="selected"' : '' }} >{{ $properties['native'] }}</option>
					@endforeach
				</select>
			</div>

			<button class="btn btn-primary">@lang('content.Save')</button>
		</form>
	</div>
</div>
<!--/row-->

@endsection