@extends('layouts.app')

@section('assets')



@endsection

@section('content')

<body>

	<nav class="navbar fixed-top navbar-expand-lg bg-faded">
		<div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand"href="{{route('welcome') }}">Shomie </a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">





				</ul>

				<ul class="navbar-nav ml-md-auto d-md-flex">

					@if (Auth::guest())
					@else

					@if(Auth::user()->type == 1)


					<li class="nav-item">
						<a class="nav-link" href="{{ route('landlord_notifications') }}">Notificações</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							Quartos
						</a>
						<div class="dropdown-menu" aria-labelledby="Preview">
							<a class="dropdown-item" href="{{ route('landlord_availability_rooms') }}">
								Mudar Disponibilidade
							</a>
						</div>
					</li>

					@else


					@endif
					@endif
					<li class="nav-item">
						<a class="nav-link" href="{{ route('landlord_profile') }}">Profile
							<span class="sr-only">(current)</span>
						</a>
					</li>
					@if (Auth::guest())
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">Register</a>
					</li>
					@else
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->name }}
						</a>
						<div class="dropdown-menu" aria-labelledby="Preview">
							<a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Logout
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>

						</div>
					</li>

					@endif

				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
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
										<td>{{$property->address}}</td>
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
								<p><span class="value">{{$accepted_notification}} </span><span class="text-muted">Visitas aceites</span></p>
								<div class="progress">
									<div class="progress-bar bg-success" role="progressbar" style="width: {{$accepted_notification/$total_notification}}%;" aria-valuenow="{{$accepted_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
							<li>
								<p><span class="value">{{$rejected_notification}} </span><span class="text-muted">Visitas rejeitadas</span></p>
								<div class="progress">
									<div class="progress-bar bg-danger" role="progressbar" style="width: {{$rejected_notification/$total_notification}}%;" aria-valuenow="{{$rejected_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
							<li>
								<p><span class="value">{{$pending_notification}} </span><span class="text-muted">Visitas por aceitar</span></p>
								<div class="progress">
									<div class="progress-bar bg-warning" role="progressbar" style="width: {{$pending_notification/$total_notification}}%;" aria-valuenow="{{$pending_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								</li
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<footer class="footer">
			<div class="container">
				<nav class="pull-left">
					<ul>
						<li>
							<a href="#">
								About Us
							</a>
						</li>
						<li>
							<a href="#">
								FAQ
							</a>
						</li>
						<li>
							<a rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/SH0mie/" target="_blank" data-original-title="Like us on Facebook">
								FACEBOOK
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright pull-right">
					&copy; Shomie,
					<script>
					document.write(new Date().getFullYear())
					</script>
				</div>
			</div>
		</footer>
	</div>


	@endsection
