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

					@if(Auth::user()->type == 0)
					<li class="nav-item">
						<a class="nav-link" href="{{ route('home') }}">Search Room</a>
					</li>

					@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('landlord_notifications') }}">Dashboard</a>
					</li>

					@endif
					@endif
					<li class="nav-item">
						<a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications</a>
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
		<h1 class="sr-only">See Notifications</h1>
		<div class="dashboard-section">
			<div class="section-heading clearfix">
				<h2 class="section-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile </h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel-content">
						<h3 class="heading"><i class="fa fa-cog" aria-hidden="true"></i>Change Details </h3>


						<form method="post" action="{{ route('erasmus_update') }}">
							{{ csrf_field() }}

							<div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
								<div class="col-md-8 col-md-offset-2">
									<div class="control-group form-group">

											<span class="class="form-control"">
											<img src="/img/default.png" class="img-responsive img-circle user-photo" alt="User Profile Picture" height="100" width="100">
										</span>


										<div class="controls">
										</br>
										<span data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
											<input type="text" class="form-control" name="erasmus_name" placeholder="Type your name" value="{{ Auth::user()->name }}">
										</span>
										<br >
										<span data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
											<input type="text" class="form-control" name="erasmus_email" placeholder="Type your emails" value="{{ Auth::user()->email }}">
										</span>
										<br >
										<span data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="">
											<input type="text" class="form-control" name="erasmus_phone" placeholder="Type your mobile number"  value="{{ Auth::user()->phone_number }}">
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-12 container allFormButtons">
								<div class="col-md-8 col-md-offset-4">
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Save</button>
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






@endsection
