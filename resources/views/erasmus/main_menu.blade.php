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

										<li class="nav-item">
											<a class="nav-link" href="{{ route('home') }}">Search Room</a>
										</li>
									@endif

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

											<a  class="dropdown-item" href="{{ route('erasmus_profile') }}">
											 Profile
										 </a>
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
			<h1 class="sr-only">See Notifications</h1>
			<div class="dashboard-section">
				<div class="section-heading clearfix">
					<h2 class="section-title"><i class="fa fa-home" aria-hidden="true"></i> See Notifications </h2>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="panel-content">
							<h3 class="heading"><i class="fa fa-bookmark" aria-hidden="true"></i>Overall Data</h3>
							<div class="table-responsive">
								<table class="table table-striped no-margin text-">
									<thead>
										<tr>
											<th>Room</th>
											<th>Visit Date</th>
											<th>Visit Time</th>
											<th>Status</th>
											<th>Address</th>
										</tr>
									</thead>
									<tbody>
										@foreach($notifications as $key => $notification)
										<tr>
											<td>
												<a href="{{ route('property', ['id'=> $notification->property_id]) }}" target="_blank" class="btn btn-sm btn-secondary btn-raised btn-round">
														<i class="fa fa-bed" style="font-size: 15px;padding-right:8px;"></i> {{ $notification->property_id }}
												</a>
											</td>
											<td>{{$notification->visit_date}}</td>
											<td>{{$notification->visit_time}}</td>
											<td>


												<div class="well">
													<h5>
														<span class="label">
															@if($notification->state == "0")
															<i class="fa fa-fw fa-spinner fa-lg"></i>
															Waiting
															@elseif($notification->state == "1")
															<i class="fa fa-fw fa-check fa-lg"></i>
															Aceite
															@elseif($notification->state == "2")
															<i class="fa fa-fw fa-times fa-lg"></i>
															Rejeitado
															@endif
														</span>
													</h5>
												</div>





												</td>
												<td>
													@if($notification->state == "1")
													<i class="fa fa-address-card-o" style="padding-left:10px;">
														{{ $notification->address}}
														{{ $notification->floor}}
														{{ $notification->number}}
													</i>
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel-content">
								<h3 class="heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Visit Requests</h3>
								<ul class="list-unstyled list-referrals">
									<li>
										<p><span class="value">{{$accepted_notification}} </span><span class="text-muted">Accepted Visits</span></p>
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: {{$accepted_notification/$total_notification}}%;background-color:#468847;" aria-valuenow="{{$accepted_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</li>
									<li>
										<p><span class="value">{{$rejected_notification}} </span><span class="text-muted">Rejected Visits</span></p>
										<div class="progress">
											<div class="progress-bar bg-danger" role="progressbar" style="width: {{$rejected_notification/$total_notification}}%;background-color:#b94a48;" aria-valuenow="{{$rejected_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</li>
									<li>
										<p><span class="value">{{$pending_notification}} </span><span class="text-muted">Waiting for Approval</span></p>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" style="width: {{$pending_notification/$total_notification}}%;background-color:#f89406;" aria-valuenow="{{$pending_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										</li
									</ul>
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
