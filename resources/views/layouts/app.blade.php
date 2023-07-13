<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Where Do I Sleep' }}</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <!-- As a heading -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="{{ route('landing') }}" class="navbar-brand">Where <b class="text-warning">Do</b> I <b class="text-warning">Sleep</b>?</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
			<!-- Collection of nav links, forms, and other content for toggling -->
			<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
				<div class="navbar-nav">
					<a href="{{ route('landing') }}" class="nav-item nav-link">Popular</a>
					<a href="{{ route('rooms-list') }}" class="nav-item nav-link">Find your room</a>
					<a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
					@if (Auth::check())
						@if(auth()->user()->role == '800')
							<a href="{{ route('admin.index') }}" class="nav-item nav-link">Administration</a>
						@endif
					@endif
				</div>
				<!--<form class="navbar-form form-inline">
					<div class="input-group search-box">
						<input type="text" id="search" class="form-control" placeholder="Buscar...">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="material-icons">&#xE8B6;</i>
							</span>
						</div>
					</div>
				</form>-->

				@if (Auth::check())
				<div class="navbar-nav ml-auto action-buttons">
					<a href="{{ route('users.edit', ['id' => auth()->user()->id]) }}" class="nav-link mr-4"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
					<a href="{{ route('logout') }}" class="btn btn-danger "><i class="fa fa-power-off"></i> Tanca sessió</a>
				</div>
				@else
				<div class="navbar-nav ml-auto action-buttons">
					<div class="nav-item dropdown">
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle mr-4"><i class="fa fa-user"></i> Sign in</a>
						<div class="dropdown-menu action-form">
							<form action="{{ route('signin') }}" method="post">
							@csrf
								<div class="form-group">
									<p class="hint-text">Inicia sessió amb les teves credencials</p>
									<div class="row">
										<div class="col-12"><input id="username" name="username" type="text" class="form-control" placeholder="Username" required="required"></div>
									</div>
									<br />
									<div class="row">
										<div class="col-12"><input id="password" name="password" type="password" class="form-control" placeholder="Password" required="required"></div>
									</div>
									<br />
									<div class="row">
										<div class="col-12"><input type="submit" class="btn btn-primary btn-block" value="Iniciar sessió"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="nav-item dropdown">
						<a href="{{ route('register') }}" class="btn btn-primary"><i class="fa fa-user"></i> Register</a>
					</div>
				</div>
				@endif
			</div>
    	</nav>
        <!-- Background image -->
        <div
            class="p-5 text-center bg-image mb-5"
            style="
              background-image: url('http://wdis.com/assets/img/about/web_banner.jpg');
              height: 450px;
              background-position: center 55%;
            "
        ></div>
        <!-- Background image -->
    </header>
	@if(session()->has('message'))
		<div class="alert alert-success info-messages">
			{{ session()->get('message') }}
		</div>
	@endif
	@if(session()->has('error'))
		<div class="alert alert-danger error-messages">
			{{ session()->get('error') }}
		</div>
	@endif
    {!! $slot !!}
	<footer class="text-center text-white mt-5" style="background-color: #f1f1f1;">
  		<div class="text-center text-dark pt-4 row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-3">
			<div class="col mb-4">
				<h4>Menu</h4>
				<ul class="list-unstyled">
					<li><a class="text-dark" href="{{ route('landing') }}">Popular</a></li>
					<li><a class="text-dark" href="{{ route('rooms-list') }}">Find your room</a></li>
					<li><a class="text-dark" href="{{ route('contact') }}">Contact</a></li>
					@if (Auth::check())
						@if(auth()->user()->role == '800')
							<li><a href="{{ route('admin.index') }}" class="text-dark">Administration</a></li>
						@endif
					@endif
				</ul>
			</div>
    		<div class="col mb-4">
				<h4>Legal menu</h4>
				<ul class="list-unstyled">
					<li><a href="{{ route('termes') }}" target="_blank" class="text-dark">Terms and conditions</a></li>
					<li><a href="#" target="_blank" class="text-dark">License</a></li>
				</ul>
			</div>
			<div class="col mb-4">
				<h3>SEO</h3>
				<p></p>
			</div>
		</div>

		<div class="text-center text-dark p-3 row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2" style="background-color: rgba(0, 0, 0, 0.2);">
			<div class="col">© 2022 Copyright: <a class="text-dark" href="http://wdis.com/">wdis.com</a></div>
			<div class="col">
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" target="_blank" href="https://joel97vil.000webhostapp.com/" role="button" data-mdb-ripple-color="dark">
					<i class="fab fa-info"></i>
				</a>
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" target="_blank" href="https://github.com/joel97vil" role="button" data-mdb-ripple-color="dark">
					<i class="fab fa-github"></i>
				</a>
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" target="_blank" href="https://www.linkedin.com/in/joel-faura-5b08381b5/" role="button" data-mdb-ripple-color="dark">
					<i class="fab fa-linkedin"></i>
				</a>
				<a class="btn btn-link btn-floating btn-lg text-dark m-1" target="_blank" href="https://twitter.com/lopubill" role="button" data-mdb-ripple-color="dark">
					<i class="fab fa-twitter"></i>
				</a>
			</div>
		</div>
    </footer>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
</html>
