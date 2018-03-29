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
					<li class="">
						<a href="" class="has-arrow" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> <span>Notifications</span></a>
						<ul aria-expanded="true">
							<li class=""><a href="{{ route('erasmus_main_menu') }}">See Notifications</a></li>
							<li class=""><a href="#">Calendar View</a></li>
						</ul>
					</li>
					<li class="active">
						<a href="{{ route('erasmus_profile') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Profile</span></a>
					</li>
				</ul>
			</nav>

		</div>
	</div>

	<div id="main-content">
		<div class="container-fluid">
			<h1 class="sr-only">Perfil</h1>
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
</div>
<div class="clearfix"></div>
<footer>
	<p class="copyright">&copy; 2018 Shomie</p>
</footer>
</div>

@endsection
