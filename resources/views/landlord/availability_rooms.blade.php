@extends('layouts.app')

@section('assets')

<link rel="stylesheet" href="{{ URL::asset('/css/profile.css')}}" />

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
						<a class="nav-link" href="{{ route('landlord_main_menu') }}">Notificações</a>
					</li>


					@else


					@endif
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

							<a  class="dropdown-item"  href="{{ route('landlord_profile') }}">
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
		<h1 class="sr-only">Disponibilidade de Quartos</h1>
		<div class="dashboard-section">
			<div class="section-heading clearfix">
				<h2 class="section-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Quartos </h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel-content">
						<h3 class="heading"><i class="fa fa-cog" aria-hidden="true"></i>Modificar disponibilidade </h3>
						<form method="post" action="{{ route('landlord_availability_rooms') }}">

							{{ csrf_field() }}
							<?php $var = 0; ?>
							<div class="container-fluid">
								<div class="row">
									@foreach($properties as $key => $property)

									<div class="col-sm-4">
										<div class="card">

											<a href="{{ route('property', ['id'=> $property->id]) }}" target="_blank">

												<?php

												$image_search = "img/RoomsPics/". $property->id . "/*.{jpg,jpeg,gif,png,PNG,JPG}";
												$images = glob($image_search, GLOB_BRACE);

												if(!empty($images))
												{

													echo "<img src='/$images[0]' alt='Room Image' class='img-responsive card-img-top'>";
												}
												else
												{
													echo "<img src='/img/not_available.jpg' alt='Room Image' class='img-responsive card-img-top'>";
												}
												?>
											</a>
											<div class="card-body">

												<a href="{{ route('property', ['id'=> $property->id]) }}" target="_blank" class="btn btn-info btn-sm pull-left">
													ID: {{ $property->id }}
												</a>
												<span class="pull-right"><strong><span class="price_title">{{ $property->price }}€</span> per month</strong></span>


											</div>
											<div class="card-footer block-center text-center">
												<p>{{ $property->address }}, {{ $property->number }}</p>

												<div class="container">
													<div class="form-group" data-toggle="buttons">
														@if($property->availability == "available")
														<label class="btn btn-on btn-sm btn-raised btn-round active" style="width:150px;">
															<input type="radio" value="{{ $property->id }}_available" name="landlord_houses[<?php echo $var; ?>]" checked autocomplete="off">
															Disponivel
														</label>
														<label class="btn btn-off btn-sm btn-raised btn-round" style="width:150px;">
															<input type="radio" value="{{ $property->id }}_not_available" name="landlord_houses[<?php echo $var; ?>]" autocomplete="off">
															Indisponivel
														</label>
														@else
														<label class="btn btn-on btn-sm btn-raised btn-round" style="width:150px;">
															<input type="radio" value="{{ $property->id }}_available" name="landlord_houses[<?php echo $var; ?>]" autocomplete="off">
															Disponivel
														</label>
														<label class="btn btn-off btn-sm btn-raised btn-round active" style="width:150px;">
															<input type="radio" value="{{ $property->id }}_not_available" name="landlord_houses[<?php echo $var; ?>]" checked autocomplete="off">
															Indisponivel
														</label>
														@endif
													</div>

												</div>
											</div>


										</div>

									</div>

									<?php $var +=  1; ?>
									@endforeach

								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-rose">Guardar</button>
							</div>
						</form>


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
<style>
.price_title {
	background-color: #fff;
	color: #FF084A;
	font-size: 15px;
	display: inline;
	opacity:0.9;
}
</style>

@endsection
