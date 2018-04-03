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

									<li class="nav-item">
										<a class="nav-link" href="{{ route('erasmus_profile') }}">Profile
											<span class="sr-only">(current)</span>
										</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications
											<span class="sr-only">(current)</span>
										</a>
									</li>


									<li class="nav-item">
										<a class="nav-link" href="#">Side Menu Items</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Pricing</a>
									</li>
								</ul>

								<ul class="navbar-nav ml-md-auto d-md-flex">
	                    <li class="dropdown nav-item">
	                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
	                            <i class="material-icons">apps</i> Components
	                        </a>
	                        <div class="dropdown-menu dropdown-with-icons">
	                            <a href="../index.html" class="dropdown-item">
	                                <i class="material-icons">layers</i> All Components
	                            </a>
	                            <a href="http://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
	                                <i class="material-icons">content_paste</i> Documentation
	                            </a>
	                        </div>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
	                            <i class="material-icons">cloud_download</i> Download
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
	                            <i class="fa fa-twitter"></i>
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
	                            <i class="fa fa-facebook-square"></i>
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
	                            <i class="fa fa-instagram"></i>
	                        </a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </nav>


	<!--
		<nav class="navbar navbar-default navbar-expand-sm navbar-light bg-faded">
		<div class="container">
			<span class="navbar-toggler-icon leftmenutrigger"></span>
			<a class="navbar-brand" href="#">{{ config('app.name', 'shomie') }}</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>
				<span class="navbar-toggler-icon"></span>

			</button>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav animate side-nav">

					<li class="nav-item">
						<a class="nav-link" href="{{ route('erasmus_profile') }}">Profile
							<span class="sr-only">(current)</span>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications
							<span class="sr-only">(current)</span>
						</a>
					</li>


					<li class="nav-item">
						<a class="nav-link" href="#">Side Menu Items</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-md-auto d-md-flex">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('home') }}">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button">
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
				</ul>
			</div>
		</div>
		</nav>
-->






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
								<table class="table table-striped no-margin">
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
											<td>  <a href="{{ route('property', ['id'=> $notification->property_id]) }}" target="_blank">{{ $notification->property_id }}</a></td>
											<td>{{$notification->visit_date}}</td>
											<td>{{$notification->visit_time}}</td>
											<td>

												@if($notification->state == "0")
												<span class="pending">
													Pending
												</span>
												@elseif($notification->state == "1")
												<span class="accepted">
													Accepted
													</span
													@elseif($notification->state == "2")
													<span class="rejected">
														Rejected
													</span>
													@endif
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
								<h3 class="heading"><i class="fa fa-info-circle" aria-hidden="true"></i> Pedidos de visita</h3>
								<ul class="list-unstyled list-referrals">
									<li>
										<p><span class="value">{{$accepted_notification}}</span><span class="text-muted">Visitas aceites</span></p>
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: {{$accepted_notification/$total_notification}}%;background-color:#468847;" aria-valuenow="{{$accepted_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</li>
									<li>
										<p><span class="value">{{$rejected_notification}}</span><span class="text-muted">Visitas rejeitadas</span></p>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" style="width: {{$rejected_notification/$total_notification}}%;background-color:#b94a48;" aria-valuenow="{{$rejected_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</li>
									<li>
										<p><span class="value">{{$pending_notification}}</span><span class="text-muted">Visitas por aceitar</span></p>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" style="width: {{$pending_notification/$total_notification}}%;background-color:#f89406;" aria-valuenow="{{$pending_notification/$total_notification}}" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										</li
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>



		@endsection
