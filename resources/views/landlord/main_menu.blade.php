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
					<li class="active"><a href="{{ route('landlord') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Menu Principal</span></a></li>

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
					<li class="">
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
					<h2 class="section-title"><i class="fa fa-home" aria-hidden="true"></i> Menu Principal </h2>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="panel-content">
							<h3 class="heading"><i class="fa fa-bookmark" aria-hidden="true"></i>Visão Global</h3>
							<div class="table-responsive">
								<table class="table table-striped no-margin">
									<thead>
										<tr>
											<th>Quarto</th>
											<th>Rua</th>
											<th>Preço</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($properties as $key => $property)
										<tr>
											<td>  <a href="{{ route('property', ['id'=> $property->id]) }}" target="_blank">{{ $property->id }}</a></td>
											<td>{{$property->adress}}</td>
											<td>{{$property->price}} €</td>
											<td>{{$property->availability}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel-content">
							<h3 class="heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Pedidos de visita</h3>
							<ul class="list-unstyled list-referrals">
								<li>
									<p><span class="value">60</span><span class="text-muted">Visitas aceites</span></p>
									<div class="progress">
										<div class="progress-bar bg-success" role="progressbar" style="width: 60%;background-color:#468847;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</li>
								<li>
									<p><span class="value">30</span><span class="text-muted">Visitas rejeitadas</span></p>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 30%;background-color:#b94a48;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</li>
								<li>
									<p><span class="value">10</span><span class="text-muted">Visitas por aceitar</span></p>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 10%;background-color:#f89406;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									</li
								</ul>
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
