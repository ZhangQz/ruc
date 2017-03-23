<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Programação III - Exemplo Prático Laravel</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Scripts -->
		<script>
			window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
		</script>
	</head>

	<body>
		<header>
			@include('layouts.includes.menu')
		</header>

		<main>
			<div class="container-fluid">
				@if($errors->any())
					<div class="alert alert-danger">
						@foreach($errors->all() as $error)
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif
			</div>

			<div class="container-fluid">
				@if(session('flash_message'))
			    	<div class="alert alert-success">
			    		{{ session('flash_message') }}
			    	</div>
				@endif
			</div>
			@yield('content')
		</main>

		<footer class="footer navbar-inverse navbar-fixed-bottom">
			<h4 class="text-primary text-center">ISMT ©Copyright 2017 // Multimédia 2º Ano</h4>
		</footer>

		<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>