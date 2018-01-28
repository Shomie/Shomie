@extends('layouts.app')

@section('assets')




<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ URL::asset('/css/profile/metisMenu/metisMenu.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('/css/profile/main.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('/css/profile/profile.css')}}" />


<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

<script src= "{{ URL::asset('/js/profile/metisMenu/metisMenu.js') }}" type="text/javascript"></script>
<script src= "{{ URL::asset('/js/profile/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src= "{{ URL::asset('/js/profile/jquery-sparkline/js/jquery.sparkline.min.js') }}" type="text/javascript"></script>
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> <span class="badge pending-requests">5</span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#"><i class="fa fa-fw fa-check accepted"></i> Visit at 12/04/2018 at 12:20. </a></li>
									<li><a href="#"><i class="fa fa-fw fa-times rejected"></i> Visit at 12/05/2018 at 15:20. </a></li>
									<li><a href="#"><i class="fa fa-fw fa-clock-o pending"></i> Visit at 12/05/2018 at 15:20. </a></li>
									<li><a href="#"><i class="fa fa-fw fa-times rejected "></i> Visit at 13/05/2018 at 16:20. </a></li>
									<li><a href="#"><i class="fa fa-fw fa-check accepted"></i> Visit at 11/05/2018 at 15:20. </a></li>
								</ul>
							</li>
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
					<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Olá, <strong>{{ Auth::user()->name }}</strong> <i class="fa fa-caret-down"></i></a>
					<ul class="dropdown-menu dropdown-menu-right account">
						<li><a href="#">Perfil</a></li>
						<li><a href="#">Definições</a></li>
						<li class="divider"></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</div>
			</div>
			<nav id="left-sidebar-nav" class="sidebar-nav">
				<ul id="main-menu" class="metismenu">
					<li class="active"><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i><span>Menu Principal</span></a></li>
					<li class="">
						<a href="#uiElements" class="has-arrow" aria-expanded="false"><i class="fa fa-bed" aria-hidden="true"></i> <span>Quartos</span></a>
						<ul aria-expanded="true">
							<li class=""><a href="ui-tabs.html">Adicionar</a></li>
							<li class=""><a href="ui-buttons.html">Remover</a></li>
							<li class=""><a href="ui-icons.html">Editar Quarto</a></li>
							<li class=""><a href="ui-bootstrap.html">Mudar Disponibilidade</a></li>
						</ul>
					</li>
					<li class="">
						<a href="#subPages" class="has-arrow" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> <span>Notificações</span></a>
						<ul aria-expanded="true">
							<li class=""><a href="page-profile.html">Ver Notificações</a></li>
							<li class=""><a href="page-profile.html">Vista de Calendário</a></li>

						</ul>
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
					<h2 class="section-title"><i class="fa fa-pie-chart"></i> Estatistica </h2>
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
										<tr>
											<td><a href="#">763648</a></td>
											<td>Rua da Praça</td>
											<td>125€</td>
											<td><span class="label label-success">Ocupado</span></td>
										</tr>
										<tr>
											<td><a href="#">7648</a></td>
											<td>Rua da Cordoba</td>
											<td>150€</td>
											<td><span class="label label-danger">Livre</span></td>
										</tr>
										<tr>
											<td><a href="#">763648</a></td>
											<td>Rua da Praça</td>
											<td>125€</td>
											<td><span class="label label-success">Ocupado</span></td>
										</tr>
										<tr>
											<td><a href="#">763648</a></td>
											<td>Rua da Praça</td>
											<td>125€</td>
											<td><span class="label label-success">Ocupado</span></td>
										</tr>
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
