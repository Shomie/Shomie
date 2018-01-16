@extends('layouts.app')

@section('assets')
<!-- External resources -->
<script src= "//code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!-- Multi Touch for Mobile -> Slider -->
<script src= "https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" type="text/javascript"></script>

<!-- Internal resources -->
<link href="{{ URL::asset('/css/home.css')}}" rel="stylesheet"/>

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Notifications <span class="badge pending-requests">5</span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><i class="fa fa-fw fa-check accepted"></i> Visit at 12/04/2018 at 12:20. </a></li>
              <li><a href="#"><i class="fa fa-fw fa-times rejected"></i> Visit at 12/05/2018 at 15:20. </a></li>
              <li><a href="#"><i class="fa fa-fw fa-clock-o pending"></i> Visit at 12/05/2018 at 15:20. </a></li>
              <li><a href="#"><i class="fa fa-fw fa-times rejected "></i> Visit at 13/05/2018 at 16:20. </a></li>
              <li><a href="#"><i class="fa fa-fw fa-check accepted"></i> Visit at 11/05/2018 at 15:20. </a></li>
            </ul>
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

<div class="wrapper">
  <div class="container">

    <form  action="{{route('search')}}" method="get" class="text-center">

      <div class="title text-center">
        <!-- Checkboxes-->
        <div class="row">
          <div class="col-md-8 col-md-offset-2">

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
              </div>
              <!-- Price Range -->



              <div class="container">
                <div class="row center-block">

                  <div class="col-sm-4 col-sm-offset-4 filter">
                    <input type="text" id="min" name="min" size="3" value="{{ $min }}" readonly="true"  />

                    <div id="slider-range" class="slider-range "></div>

                    <input type="text" id="max" name="max" size="3" value="{{ $max }}" readonly="true"  />


                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button class="btn btn-default btn-success btn-search-submit" type="submit">Search</button>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- attack protection, laravel needs this to be used in routes otherwise fails -->
                    </div>
                  </div>


                </div>

              </div>


            </form>
          </div>
        </div>

        <div class="main" id="properties">

          <div class="section">
            <div class="container container-full">
              @foreach($properties as $key => $value)
              <div class="col-md-6 col-sm-10">
                <div class="panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">
                    <a href="{{ route('property', ['id'=> $value->id]) }}" target="_blank">

                      <?php

                      $image_search = $value->route . "/*.{jpg,jpeg,gif,png,JPG}";
                      $images = glob($image_search, GLOB_BRACE);

                      if(!empty($images))
                      {
                        echo "<img src='/$images[0]' alt='Room Image' class='img-responsive'>";
                      }
                      else
                      {
                        echo "<img src='' alt='Room Image' class='img-responsive'>";
                      }
                      ?>
                    </a>
                  </div>
                  <div class="panel-footer">

                    <div class="row">                      
                      <div class="pull-left pack">
                        <span><i class="fa fa-map-marker"></i>
                          {{$value->presentation}} {{$value->zone}}
                        </span>
                        <span><i class="fa fa-bed"></i>
                          @if ($value->type === "appartment") {{"Appartment"}} @elseif ($value->type === "single_room") {{"Single Room"}}  @elseif ($value->type === "double_room") {{"Double Room"}} @endif
                        </span>
                      </div>
                      <div class="pull-right">
                        <button class="btn  btn-simple btn-default btn-sm"><p class="fa fa-euro"></p> {{$value->price}} </button>
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
        @endsection
