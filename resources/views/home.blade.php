@extends('layouts.app')

@section('assets')
<!-- External resources -->
<script src= "//code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<!-- Internal resources -->
<link href="{{ URL::asset('/css/slider_filter.css')}}" rel="stylesheet"/>
<script src= "{{ URL::asset('/js/slider_filter.js') }}" type="text/javascript"></script>
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

              <a href="{{route('userprofile')}}">Profile</a>


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

<div class="wrapper" style="background:white;">
  <div class="container">

      <form  action="{{url('search')}}" method="get" class="text-center">
        <!-- Checkboxes-->
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h3 class="title text-center" style="margin-top:0px;">Find your home today</h1>

            <div class="btn-group" data-toggle="buttons">

              @if ($filteroptions === "all_rooms")
              <label class="btn active">
                <input type="radio" name="options" value="all_rooms" autocomplete="off" checked>
                @else
                <label class="btn">
                  <input type="radio" name="options" value="all_rooms" autocomplete="off">
                  @endif
                  <span>
                    <i class="fa fa-check" aria-hidden="true"></i>
                    All Rooms
                  </span>
                </label>


                @if ($filteroptions === "single_room")
                <label class="btn active">
                  <input type="radio" name="options" value="single_room" autocomplete="off" checked>
                  @else
                  <label class="btn">
                    <input type="radio" name="options" value="single_room" autocomplete="off">
                    @endif
                    <span>
                      <i class="fa fa-check" aria-hidden="true"></i>
                      Single Room
                    </span>
                  </label>

                  @if ($filteroptions === "double_room")
                  <label class="btn active">
                    <input type="radio" name="options" value="double_room" autocomplete="off" checked>
                    @else
                    <label class="btn">
                      <input type="radio" name="options" value="double_room" autocomplete="off">
                      @endif
                      <span>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        Double Room
                      </span>
                    </label>

                    @if ($filteroptions === "appartment")
                    <label class="btn active">
                      <input type="radio" name="options" value="appartment" autocomplete="off" checked>
                      @else
                      <label class="btn">
                        <input type="radio" name="options" value="appartment" autocomplete="off">
                        @endif
                        <span>
                          <i class="fa fa-check" aria-hidden="true"></i>
                          Appartment
                        </span>
                      </label>

                    </div>
                  </div>
                </div>

                <!-- Price Range -->
                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <div id="slider-range" class="col-md-8 col-md-offset-2">
                      </div>
                      <span class="col-md-1 col-md-offset-2" >Min: <input type="text" id="min" name="min" size="4" value="{{ $min }}" readonly="true" /></span>
                      <span class="col-md-1 col-md-offset-6"> Max: <input type="text" id="max" name="max" size="4" value="{{ $max }}" readonly="true" /></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <button class="btn btn-default btn-success btn-search-submit" type="submit">Search</button>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- attack protection, laravel needs this to be used in routes otherwise fails -->
                    </div>
                  </div>


                </div>

              </form>

            </div>


          </div>


          <div class="main" id="properties">

            <div class="section">
              <div class="container">
                @foreach($properties as $key => $value)
                <div class="col-md-6 col-sm-10">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <span class="fa fa-map-marker"></span>
                      {{$value->presentation}} {{$value->zone}}
                    </div>
                    <div class="panel-body">
                      <a href="{{ route('property', ['id'=> $value->id]) }}" target="_blank">
                        <img src="{{$value->route}}" alt="Room Image" class="img-responsive" style="max-height:428px; min-height:428px;">
                        <!-- <?php echo "/".$value->route; ?> -->
                        <!-- <img src="<?php echo "http://shomie.io/".$value->route?>" alt="Fallo" class="img-responsive"> -->
                      </a>
                    </div>
                    <div class="panel-footer">

                      <div class="row">
                        <button class="btn  btn-simple btn-default btn-sm"><i class="fa fa-bed"></i> {{$value->type}}</button>
                        <button class="btn  btn-simple btn-default btn-sm"><i class="fa fa-exclamation-circle"></i> House with {{$value->capacity}} Rooms</button>

                        <div class="pull-right">
                          <button class="btn  btn-simple btn-default btn-sm"><i class="fa fa-euro"></i> {{$value->price}}</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                @endforeach
                <div class="text-center">
                  <!-- To append other get variables -->
                  {{ $properties->appends(request()->except('page'))->links() }}
                </div>

              </div>
            </div>
          </div>
        </div>
        @endsection
