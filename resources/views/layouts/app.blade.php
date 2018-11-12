<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/popper.min.js') }}" defer></script>
	<script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" defer></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
	<script src="{{ asset('js/energisa.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
	
		<nav class="navbar navbar-light navbar-gray justify-content-between">
			<img src="/img/energisa-logo.png" class="d-inline-block align-top" alt="">
			<ul class="nav nav-pills justify-content-end">
			  @guest
				  <li class="nav-item">
					  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				  </li>
			  @else
				  <li class="nav-item">
					<a class="nav-link active" href="/">Consulta</a>
				  </li>
				  <!--<li class="nav-item">
					<a class="nav-link" href="ajuda">Ajuda</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="contato">Contato</a>
				  </li>-->
				  <li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				  </li>
			  @endguest
			</ul>
		</nav>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
	<footer class="footer">
		<small>&copy; Copyright 2018, Polícia Federal</small>
		<br />
		<small>Desenvolvido por APF &Eacute;der Carlos - SR/PF/MT</small>
	</footer>
</body>
</html>
