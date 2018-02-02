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
          <li><a href="{{ route('register') }}">Create account</a></li>
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
              <form class="form" method="POST" action="{{ route('login')}}">
                {{ csrf_field() }}
                <div class="header header-success text-center">
                  <h4>Login</h4>
                  <div class="social-line">
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-simple btn-just-icon">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="{{ url('/auth/google') }}" class="btn btn-simple btn-just-icon">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
                <p class="text-divider">Login with your account</p>
                <div class="content">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">email</i>
                    </span>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">lock_outline</i>
                    </span>
                    <input type="password" name="password" placeholder="Password" class="form-control" />
                  </div>
                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-simple btn-default btn-lg">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <nav class="text-center">
            <ul>
              <li>
                <a href="#">
                  Coimbra
                </a>
              </li>
              <li>
                <a href="#">
                  Landlords
                </a>
              </li>
              <li>
                <a href="#">
                  Contact
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </footer>

    </div>

  </div>



  @endsection
