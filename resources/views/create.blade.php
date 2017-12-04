@extends('layouts')

@section('content')

<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="/store" method="post">

			{{ csrf_field() }}

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" placeholder="Title" name="title">
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea class="form-control" id="content" rows="3" name="content"></textarea>
			</div>
			<div class="form-group">
				<label>Select Language</label>
				<select class="form-control" name="language_code">
					<option value="en">English</option>
					<option value="da">Danish</option>
				</select>
			</div>

			<input type="hidden" name="source_language_id" value="">

			<button class="btn btn-primary">Save</button>
		</form>
	</div>
</div>
<!--/row-->

@endsection