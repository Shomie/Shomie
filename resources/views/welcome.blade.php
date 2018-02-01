@extends('layouts.app')

@section('assets')
<!-- Internal resources -->
<link href="{{ URL::asset('/css/welcome.css')}}" rel="stylesheet"/>

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<script src= "{{ URL::asset('/js/welcome.js') }}" type="text/javascript"></script>

@endsection

@section('content')
<body class="home-page">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
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

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
          @else

          <li>
            @if(Auth::user()->type == 0)
            <a href="{{ route('erasmus_main_menu') }}">
              <i class="fa fa-fw fa-bell-o"></i>
              Notifications
            </a>
            @else
            <a href="{{ route('landlord_notifications') }}">
              <i class="fa fa-fw fa-location-arrow"></i>
              Dashboard
            </a>
            @endif
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
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

<section class="welcome_main">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="text-center">
          <h1>The <strong> fastest </strong> way to <strong> visit</strong> your new
            <strong>Coimbra</strong> home!</h1>
          </div>
        </div>
      </br>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="text-center">
          <a href="{{ url('/home') }}">
            <input class="btn btn-default btn-success" value="Start searching!" type="button"/>
          </a>
        </div>
      </div>
    </div>
  </section>


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
