@extends('layouts.app')

@section('assets')
<!-- Internal resources -->

<style>

</style>
@endsection

@section('content')
<body>

  <nav class="navbar navbar-default navbar-expand-sm navbar-light bg-faded">
  <div class="container">
    <a class="navbar-brand" href="#">{{ config('app.name', 'shomie') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span class="navbar-toggler-icon"></span>
      <span class="navbar-toggler-icon"></span>
      <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
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




  <div class="container text-center">

    <div class="jumbotron">
      <h1 class="display-3">Shomie is here to help you out.</h1>
      <p class="lead">The fastest way to find your home in Coimbra.</p>
      <hr class="my-4">
      <p> We have a nice amount of rooms for you to visit.</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="{{ url('/home') }}" role="button">Start right away!</a>
      </p>
    </div>
  </div>



  <section class="welcome_second">
    <div class="container">
      <!-- Background Image + Text + Button -->
      <section class="text-center">
        <div class="col-sm-4 card_bottom">
          <a href="{{ url('/home') }}">
            <div class="card" style="width: 18rem;">
              <i class="fa_color card-img-top fa fa-search fa-5x" ></i>
              <div class="card-body">
                <h5 class="card-title">EXPLORE</h5>
                <p class="card-text">Find the accomodation that fits you.</p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-sm-4 card_bottom">
          <div class="card" style="width: 18rem;">
            <i class="fa_color card-img-top fa fa-calendar fa-5x" ></i>
            <div class="card-body">
              <h5 class="card-title">BOOK</h5>
              <p class="card-text">Book a visit to see the house.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4 card_bottom">
          <div class="card" style="width: 18rem;">
            <i class="fa_color card-img-top fa fa-map-marker fa-5x" ></i>
            <div class="card-body">
              <h5 class="card-title">VISIT</h5>
              <p class="card-text">Be there on time and enjoy.</p>
            </div>
          </div>
        </div>
      </section>


    </div>
  </section>









  <!--
  <div class="container">
  <div class="row">
  <footer class="text-center">
  <ul>
  <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
  <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
  <li><a href="#"><i class="fa fa-snapchat-square"></i></a></li>
  <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
  <li><a href="#"><i class="fa fa-github-square"></i></a></li>
</ul>
<p>Shomie &copy;</p>
</footer>
</div>
</div>

-->
@endsection
