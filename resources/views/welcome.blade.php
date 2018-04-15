@extends('layouts.app')

@section('assets')
<!-- Internal resources -->


@endsection

@section('content')
<body>


  <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg">
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
                    <a class="nav-link" href="{{ route('login') }}">  <i class="material-icons">content_paste</i> Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="material-icons">cloud_download</i>Register</a>
                  </li>
                  @else



                    @if(Auth::user()->type == 0)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('home') }}">Search Room</a>
                    </li>
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

                        @if(Auth::user()->type == 0)
                        <a  class="dropdown-item" href="{{ route('erasmus_profile') }}">
          							 Profile
          							</a>
                        @else
                        <a  class="dropdown-item"  href="{{ route('landlord_profile') }}">
                          Profile
                        </a>
                        @endif


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
    <div class="page-header " data-parallax="true" style=" background-image: url('img/welcome/background.jpg'); ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Let's Start.</h1>
                    <h4>Finding a room was never that easy. Just pick the best room for you and book a visit with the landlord. The room details and all the necessary information is accessible here. Further details will be discussed witht he landlord.</h4>
                    <br>
                    <a href="{{ url('/home') }}" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-search"></i> Let's Search
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="section text-center">

              <div class="col-md-12 ml-auto mr-auto">
                <h2 class="title">How it works</h2>
                  <h5 class="description">
                      We offer you the possibility to search rooms and book visits to see them in person. While visiting the rooms with the landlords
                      you might ask whatever you want to know regarding the room and the necessary compartments of the house. In the end if you want to
                      stay you discuss with him all the needed details and the room is yours. In the end if you kindly don't mind give us feedback
                      of the house and tell us if you stayed or not (you win automatically a free dinner in Coimbra if you stay in the room).
                      </h5>
              </div>

                <div class="team">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain">
                                    <div class="col-md-6 ml-auto mr-auto">
                                        <img src="img/welcome/search_rooms.png" alt="Thumbnail Image" class="img-fluid" height="100" width="100">
                                    </div>
                                    <h4 class="card-title">Search
                                        <br>
                                        <small class="card-description text-muted">Any type of room you like.</small>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">
                                          We have available in our database a far amount of rooms that can be rented.
                                          We currently have the possibility to rent single rooms, double rooms or
                                          a full appartment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain">
                                    <div class="col-md-6 ml-auto mr-auto">
                                      <img src="img/welcome/schedule.png" alt="Thumbnail Image" class="img-fluid" height="100" width="100">
                                    </div>
                                    <h4 class="card-title">Book visits
                                        <br>
                                        <small class="card-description text-muted">anytime you want.</small>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">
                                          We offer you a mechanism for you to book room visits
                                          directly with the landlord. You may book as many visits
                                          as you want for the rooms you like more.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain">
                                    <div class="col-md-6 ml-auto mr-auto">
                                      <img src="img/welcome/visit_rooms.png" alt="Thumbnail Image" class="img-fluid" height="100" width="100">
                                    </div>
                                    <h4 class="card-title">Visit
                                        <br>
                                        <small class="card-description text-muted">and stay if you like it.</small>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">
                                          The visits will be conducted with the room landlord itself.
                                          He/She will show you the room and all the necessary compartions.
                                          All the details are meant to be discussed while visiting.
                                        </p>
                                    </div
                                </div>
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
