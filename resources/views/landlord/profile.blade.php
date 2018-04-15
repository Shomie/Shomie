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
					            <a class="nav-link" href="{{ route('landlord_main_menu') }}">Notificações</a>
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
			<h1 class="sr-only">Perfil</h1>
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
