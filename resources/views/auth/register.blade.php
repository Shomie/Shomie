@extends('layouts.app')

@section('assets')
<!-- Internal resources -->


@endsection

@section('content')
<body class="signup-page">

  <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
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
        <ul class="navbar-nav ml-auto">
          @if (Auth::guest())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><i class="material-icons">cloud_download</i>Login</a>
          </li>
          @else
          @if(Auth::user()->type == 0)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications</a>
          </li>

          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('landlord_main_menu') }}">Notificações</a>
          </li>

          @endif
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


  <div class="page-header" style="background-image: url(img/welcome/background.jpg); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ml-auto mr-auto">
          <form class="form" role="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="card card-signup">
              <h2 class="card-title text-center">Register</h2>
              <div class="social text-center">
                <a href="{{ url('/auth/facebook') }}" class="btn btn-primary btn-round btn-just-icon">
                  <i class="fa fa-facebook-square"></i>
                </a>
                <a href="{{ url('/auth/google') }}" class="btn btn-primary btn-round btn-just-icon">
                  <i class="fa fa-google-plus"></i>
                </a>
                <h4> or register with other method </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4 mr-auto">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name') }}" required autofocus>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">email</i>
                          </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email..." name="email" value="{{ old('email') }}" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mr-auto">

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">phone</i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone number..." value="{{ old('phone_number') }}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password..." name="password" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                          </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password confirmation..." name="password_confirmation" required>
                      </div>
                    </div>



                    <div class="text-center" style="padding-top:10px;">
                      <button type="submit" class="btn btn-primary btn-round">Create new account</button>
                    </div>


                  </div>
                  <div class="col-md-4 ml-auto">
                    <div class="info info-horizontal">
                      <div class="icon icon-rose">
                        <i class="fa fa-eye fa-limit-size"></i>
                      </div>
                      <div class="description">
                        <h4 class="info-title">Book visits</h4>
                        <p class="description">
                          Having an account you'll be granted access to book visits to rooms you like.
                        </p>
                      </div>
                    </div>
                    <div class="info info-horizontal">
                      <div class="icon icon-primary">
                        <i class="fa fa-info fa-limit-size"></i>
                      </div>
                      <div class="description">
                        <h4 class="info-title">Support</h4>
                        <p class="description">
                          Having an account it's easier for us to give you support if needed.
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </form>
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
