@extends('layouts.app')

@section('assets')

<link rel="stylesheet" href="{{ URL::asset('/css/profile/metisMenu/metisMenu.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('/css/profile/main.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('/css/profile/profile.css')}}" />

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

<script src= "{{ URL::asset('/js/profile/metisMenu/metisMenu.js') }}" type="text/javascript"></script>
<script src= "{{ URL::asset('/js/profile/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src= "{{ URL::asset('/js/profile/common.js') }}" type="text/javascript"></script>
<script src= "{{ URL::asset('/js/profile/profile.js') }}" type="text/javascript"></script>

@endsection

@section('content')

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="fa fa-angle-left rotate" aria-hidden="true"></i></button>
				</div>

				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'shomie') }}
				</a>
				<div class="navbar-right">

					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<div id="left-sidebar" class="sidebar">
		<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
			<span class="sr-only">Toggle Fullwidth</span>
			<i class="fa fa-angle-left"></i>
		</button>
		<div class="sidebar-scroll">
			<div class="user-account">
				<img src="/img/default.png" class="img-responsive img-circle user-photo" alt="User Profile Picture">
				<div class="dropdown">
					<p href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Olá, <strong>{{ Auth::user()->name }}</strong></p>
				</div>
			</div>
			<nav id="left-sidebar-nav" class="sidebar-nav">
				<ul id="main-menu" class="metismenu">
					<li class=""><a href="{{ route('landlord') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Menu Principal</span></a></li>

					<li class="">
						<a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-bed" aria-hidden="true"></i> <span>Quartos</span></a>
						<ul aria-expanded="true">
							<li class=""><a href="#">Adicionar</a></li>
							<li class=""><a href="#">Remover</a></li>
							<li class=""><a href="#">Editar Quarto</a></li>
							<li class=""><a href="{{ route('landlord_availability_rooms') }}">Mudar Disponibilidade</a></li>
						</ul>
					</li>
					<li class="">
						<a href="" class="has-arrow" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> <span>Notificações</span></a>
						<ul aria-expanded="true">
							<li class=""><a href="#">Ver Notificações</a></li>
							<li class=""><a href="#">Vista de Calendário</a></li>
						</ul>
					</li>
					<li class="active">
						<a href="{{ route('landlord_profile') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Perfil</span></a>
					</li>
				</ul>
			</nav>

		</div>
	</div>

	<div id="main-content">
		<div class="container-fluid">
			<h1 class="sr-only">Menu Principal</h1>
			<div class="dashboard-section">
				<div class="section-heading clearfix">
					<h2 class="section-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Perfil </h2>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel-content">
							<h3 class="heading"><i class="fa fa-cog" aria-hidden="true"></i>Modificar detalhes </h3>
							<form method="post" action="{{ route('landlord_update') }}">
								{{ csrf_field() }}
								<div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
									<div class="col-md-8 col-md-offset-2">
										<div class="control-group form-group">
											<div class="controls">
											</br>
											<span data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
												<input type="text" class="form-control" name="landlord_name" placeholder="Introduza o seu nome" value="{{ Auth::user()->name }}">
											</span>
											<br >
											<span data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
												<input type="text" class="form-control" name="landlord_email" placeholder="Introduza o seu email" value="{{ Auth::user()->email }}">
											</span>
											<br >
											<span data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
												<input type="text" class="form-control" name="landlord_phone" placeholder="Introduza o seu numero de telefone"  value="{{ Auth::user()->phone_number }}">
											</span>
										</div>
									</div>
								</div>
								<div class="col-md-12 container allFormButtons">
									<div class="col-md-8 col-md-offset-4">
										<div class="form-group">
											<button type="submit" class="btn btn-primary">Guardar</button>
										</div>
									</div>
									&nbsp;
								</div>
							</div>
						</form>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<footer>
	<p class="copyright">&copy; 2018 Shomie</p>
</footer>
</div>

@endsection
