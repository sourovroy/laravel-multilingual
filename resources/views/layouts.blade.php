<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Template Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<style>
		.blog-post{
			margin-bottom: 2rem;
			background-color: #e9ecef;
			border-radius: .3rem;
			padding: 2rem;
		}
		.the-container{
			padding-top: 6rem;
		}
	</style>

</head>
<body>

	<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="/">Laravel Multilingual</a>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/{{ ($current_local == 'en') ? '' : $current_local }}">@lang('content.Home')</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/create">@lang('content.CreatePost')</a>
				</li>
			</ul>
			
			<ul class="navbar-nav form-inline my-2 my-lg-0">
				@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
				<li class="nav-item {{ ($localeCode == $current_local) ? 'active' : '' }}" data-langcode="{{ $localeCode }}">
					<a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], false) }}">{{ $properties['native'] }}</a>
				</li>
				@endforeach
			</ul>
		</div>
	</nav>

	<main role="main" class="container the-container">

		@yield('content')

		<hr>

	</main>
	<!--/.container-->

	<footer class="text-center">
		<p>&copy; @lang('content.Company') {{ date('Y') }}</p>
	</footer>

</body>
</html>