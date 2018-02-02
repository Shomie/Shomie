@extends('layouts.app')

@section('content')
<body class="signup-page">
    <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-example">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'shomie') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navigation-example">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else

                           <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                           </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
 	<div class="wrapper">
            <div class="header header-filter" style="background-image: url('/img/login/uc_2.jpg'); background-size: cover; background-position: top center;">
	<div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
    	      <div class="card card-signup">
                    <form class="form" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
				<div class="header header-success text-center">
                                    <h4>Signup with</h4>
                                    <div class="social-line">
                                        <a href="{{ url('/auth/facebook') }}" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="{{ url('/auth/twitter') }}" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="{{ url('/auth/google') }}" class="btn btn-simple btn-just-icon">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>


		<div class="content">
			<div class="input-group">
                            <span class="input-group-addon">
                                 <i class="material-icons">account_box</i>
                            </span>

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
			</div>
			<div class="input-group">
                               <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                         </div>
			</div>
			<div class="input-group">
                            <span class="input-group-addon">
                                 <i class="material-icons">phone</i>
                            </span>

                         <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <input id="name" type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" required autofocus>
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                         </div>
			</div>
			<div class="input-group">

                               <span class="input-group-addon">
                                   <i class="material-icons">lock_outline</i>
                               </span>
                       	    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
			</div>
			<div class="input-group">

                               <span class="input-group-addon">
                               	<i class="material-icons">lock_outline</i>
                               </span>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Password confirmation" name="password_confirmation" required>
                            </div>
			</div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-simple btn-block">
                                    Create new account
                                </button>
                        </div>
			</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
