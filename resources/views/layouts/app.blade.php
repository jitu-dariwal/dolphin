<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Scripts 
		<script src="{{ asset('js/app.js') }}" defer></script>-->

		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/developer.css') }}" rel="stylesheet">
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
				<div class="container">
					<a class="navbar-brand" href="{{ url('/') }}">
						{{ config('app.name', 'Laravel') }}
						@if (!Auth::guest())
							( {{ Auth::user()->name }} )
						@endif
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Left Side Of Navbar -->
						<ul class="navbar-nav mr-auto">

						</ul>

						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a id="navbarDropdown" class="nav-link" href="{{ route('faq') }}">
									Help
								</a>
							</li>	
							<!-- Authentication Links -->
							@guest
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
							@else
								<li class="nav-item">
									<a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>
							@endguest
						</ul>
					</div>
				</div>
			</nav>

			<main class="py-4">
				@yield('content')
			</main>
		</div>
	</body>
	
	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<!--<script type="text/javascript" src="{{ asset('js/jquery.form-validator.min.js') }}"></script>-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	
	<script>
		$(document).ready(function(){
			$.validate({ 
				modules : 'file security',
				inlineErrorMessageCallback: function($input, errorMessage, config) {
					if (errorMessage) {
						if($input.closest('div').hasClass('input-group')){
							$input.closest('div').nextAll().remove();
							$('<span class="help-block form-error">'+errorMessage+'</span>').insertAfter($input.closest('div'));
						}else{
							$('<span class="help-block form-error">'+errorMessage+'</span>').insertAfter($input);
						}
					}else {
						if($input.closest('div').hasClass('input-group'))
							$input.closest('div').nextAll().remove();
						else
							$input.nextAll().remove();
					}
					return false; // prevent default behaviour
				},
				submitErrorMessageCallback : function($form, errorMessages, config) {
					/* if (errorMessages) {
						customDisplayErrorMessagesInTopOfForm($form, errorMessages);
					} else {
						customRemoveErrorMessagesInTopOfForm($form);
					}
					return false; // prevent default behaviour */
				}
			});
		});
	</script>
</html>
