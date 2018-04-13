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



									@if (Auth::guest())
									@else

										@if(Auth::user()->type == 1)
										<li class="nav-item">
											<a class="nav-link" href="{{ route('landlord') }}">Home</a>
										</li>

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

								</ul>

								<ul class="navbar-nav ml-md-auto d-md-flex">

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
			<h1 class="sr-only">Notificações</h1>
			<div class="dashboard-section">
				<div class="section-heading clearfix">
					<h2 class="section-title"><i class="fa fa-fw fa-bell-o"></i> Notificações </h2>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel-content">
							<h3 class="heading"><i class="fa fa-cog" aria-hidden="true"></i>Gerir Pedidos </h3>

							<div class="table-responsive">
								<table class="table table-striped no-margin">
									<thead>
										<tr>
											<th>Quarto</th>
											<th>Data da visita</th>
											<th>Hora da visita</th>
											<th>Estado</th>
											<th>Pedidos</th>
										</tr>
									</thead>
									<tbody>
										@foreach($communications as $key => $communication)
										<tr>
											<form method="post" action="{{ route('landlord_notification_answer') }}">
												{{ csrf_field() }}

												<td>  <a href="{{ route('property', ['id'=> $communication->property_id]) }}" target="_blank">{{ $communication->property_id }}</a></td>
												<td>{{$communication->visit_date}}</td>
												<td>{{$communication->visit_time}}</td>
												<td>{{$communication->state}}</td>
												<td>
													@if($communication->state == "0")
													<button type="submit" class="btn btn-success" name="notification_reply" value="accepted">
														<i class="fa fa-fw fa-check" aria-hidden="true"></i>Aceitar
													</button>

													<button type="submit" class="btn btn-danger" name="notification_reply" value="rejected">
														<i class="fa fa-fw fa-times" aria-hidden="true"></i>Rejeitar
													</button>
													@elseif($communication->state == "1")
													<span class="accepted">accepted</span>
													@elseif($communication->state == "2")
													<span class="rejected">rejected</span>
													@endif
												</td>
												<input type="hidden" name="id" value="{{ $communication->id }}">
											</form>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>


						</div>
					</div>


				</div>
		</div>
	</div>

@endsection
