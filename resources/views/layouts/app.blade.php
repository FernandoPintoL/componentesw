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
    <!-- Fonts -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
	<link rel="stylesheet" href="{{ asset('css/sweetalert2.css')}}">
	<link rel="stylesheet" href="{{ asset('css/material.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css')}}">
	<link rel="stylesheet" href="{{ asset('css/main.css')}}">
</head>
<body>
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Salir</div>
					</li>
					<li class="text-condensedLight noLink" ><small>{{ auth()->user()->name }}</small></li>
					<li class="noLink">
						<figure>
							<img src="{{ asset('assets/img/avatar-male.png') }}" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> {{ config('app.name', 'Laravel') }}
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="{{ asset('assets/img/avatar-male.png') }}" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						{{ auth()->user()->name }}<br>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; Menu</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="{{ asset('/home') }}" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					@can('usuario.index')
					<li class="full-width">
						<a href="{{ asset('usuario') }}" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							
						</ul>
					</li>
					@endcan
					@can('roles.index')
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Roles y Privilegios
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="{{ url('roles') }}" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ROLES
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="{{ url('privilegios') }}" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PROVIDERS
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					@endcan
					
					<li class="full-width divider-menu-h"></li>					
				</ul>
			</nav>
		</div>
	</div>
	<main class="full-width pageContent">
		<hr>
		@if(session('info'))
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2">
						<div class="alert alert-success" role="alert">
							{{ session('info') }} 
						</div>						
					</div>
				</div>
			</div>
			
		@endif
		 @yield('content')
	</main>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('js/material.min.js') }} " ></script>
	<script src="{{ asset('js/sweetalert2.min.js') }} " ></script>
	<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }} " ></script>
	<script src="{{ asset('js/main.js') }} " ></script>
</body>
</html>
