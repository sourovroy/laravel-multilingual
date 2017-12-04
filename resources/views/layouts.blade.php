<!doctype html>
<html lang="en">
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
					<a class="nav-link" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/create">Create Post</a>
				</li>
			</ul>
			<ul class="navbar-nav form-inline my-2 my-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="">English</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Danish</a>
				</li>
			</ul>
		</div>
	</nav>

	<main role="main" class="container the-container">

		@yield('content')

		<hr>

	</main>
	<!--/.container-->

	<footer class="text-center">
		<p>&copy; Company 2017</p>
	</footer>

</body>
</html>