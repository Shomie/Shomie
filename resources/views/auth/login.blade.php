@extends('layouts.app')

@section('assets')
<!-- Internal resources -->


@endsection

@section('content')
<body class="signup-page">

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
                <ul class="navbar-nav ml-auto">
                  @if (Auth::guest())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="material-icons">cloud_download</i>Register</a>
                  </li>
                  @else
                    @if(Auth::user()->type == 0)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications</a>
                    </li>

                    @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('landlord_notifications') }}">Dashboard</a>
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


<div class="page-header" style=" background-image: url(img/welcome/background.jpg); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                      <h2 class="card-title text-center">Login</h2>
                      <div class="card-body">
                      <div class="row">
                        <div class="col-md-5 ml-auto">
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
                        <div class="col-md-5 mr-auto">
                            <div class="social text-center">
                              <a href="{{ url('/auth/facebook') }}" class="btn btn-primary btn-round btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                              </a>
                              <a href="{{ url('/auth/google') }}" class="btn btn-primary btn-round btn-just-icon">
                                <i class="fa fa-google-plus"></i>
                              </a>
                                <h4> or sigin with other method </h4>
                            </div>
                            <form class="form" method="POST" action="{{ route('login')}}">
                              {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input type="text" name="email" class="form-control" placeholder="Email...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input type="password" placeholder="Password..." name="password" class="form-control" />
                                    </div>
                                </div>


                                <div class="text-center" style="padding-top:10px;">
                                  <button type="submit" class="btn btn-primary btn-round">Sign in</button>
                                </div>
                            </form>
                        </div>
                  </div>
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
                      <a href="https://www.creative-tim.com">
                            About Us
                        </a>
                    </li>
                    <li>
                      <a href="https://www.creative-tim.com">
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
