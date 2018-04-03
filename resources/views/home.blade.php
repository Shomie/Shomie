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


        <ul class="navbar-nav ml-md-auto d-md-flex">

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

  <!-- TODO: to put better
  <div class="container">
  <div class="section text-center">
  <div class="row">
  <div class="col-md-8 ml-auto mr-auto">

  <form  action="{{route('search')}}" method="get" class="text-center">

  <div class="title text-center">
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
<input type="hidden" name="_token" value="{{ csrf_token() }}"/>  attack protection, laravel needs this to be used in routes otherwise fails
</div>
</div>


</div>

</div>


</form>

</div>
</div>
</div>
</div>
-->





<div class="main">

  <div class="section">
    <div class="container">
      <div class="row">

        @foreach($properties as $key => $value)

        <div class="col-lg-6">
          <div class="card">

            <a href="{{ route('property', ['id'=> $value->id]) }}" target="_blank">

              <?php

              $image_search = "img/RoomsPics/". $value->id . "/main.{jpg,jpeg,gif,png,PNG,JPG}";
              $images = glob($image_search, GLOB_BRACE);

              if(count($images) == 0)
              {
                /* If the main image is not found search for one existing image */
                $image_search = "img/RoomsPics/". $value->id . "/*.{jpg,jpeg,gif,png,PNG,JPG}";
                $images = glob($image_search, GLOB_BRACE);
              }

              if(!empty($images))
              {

                echo "<img src='/$images[0]' alt='Room Image' class='img-responsive card-img-top'>";
              }
              else
              {
                echo "<img src='/img/not_available.jpg' alt='Room Image' class='img-responsive card-img-top'>";
              }
              ?>
            </a>
            <div class="card-body">


              <h5 class="card-title">{{$value->presentation}} {{$value->zone}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $value->description }}</h6>
              <a>
                <div class="pull-left type_room">
                  <span><i class="fa fa-bed"></i>
                    @if ($value->type === "appartment") {{"Appartment"}} @elseif ($value->type === "single_room") {{"Single Room"}}  @elseif ($value->type === "double_room") {{"Double Room"}} @endif
                  </span>
                </div>
              </a>
              <a class="card-link pull-right">  {{$value->price}} <i class="fa fa-euro"></i></a>
            </div>
          </div>

        </div>
        @endforeach



      </div>

        <!-- To append other get variables -->
        {{ $properties->appends(request()->except('page'))->links() }}
    </div>
  </div>




</div>


@endsection
