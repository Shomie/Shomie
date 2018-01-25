

@extends('layouts.app')


@section('assets')
<link href="{{ URL::asset('/css/property.css') }}" rel="stylesheet"/>
<script src= "{{ URL::asset('/js/property.js') }}" type="text/javascript"></script>

@endsection


@section('content')


<body class="property-page">
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


<div class="container text-center" style="padding-top:70px;">


  <div id="image_slider" class="modal fade in bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content ">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
          </button>

          <h5 class="modal-title">Gorgeous room!</h5>

        </div>

        <div class="modal-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
            <ol class="carousel-indicators">

              @foreach($images as $key => $image)
              <?php static $i = 0; ?>

              @if($i == 0)
              <li data-target="#carousel-example" data-slide-to="{{ $i }}" class="active"></li>
              @else
              <li data-target="#carousel-example" data-slide-to="{{ $i }}"></li>
              @endif

              <?php $i++; ?>

              @endforeach

            </ol>


            <!-- Wrapper for slides -->
            <div class="carousel-inner">

              @foreach($images as $key => $image)
              <?php static $j = 0; ?>

              @if($j == 0)
              <div class="item active">
                <img class="img-responsive center-block" src="/{{ $image }}" alt="...">
              </div>
              @else
              <div class="item">
                <img class="img-responsive center-block" src="/{{ $image }}" alt="...">
              </div>
              @endif

              <?php $j++; ?>

              @endforeach

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>


<div class="wrapper" style="background-color:white;">
  <div class="container container-full">

    <div class="panel panel-default ">
      <div class="panel-heading" style="padding:0;">

        @if(!empty($images))
        <img src="/{{ $images[0] }}" class="header_image" alt="aaa" data-toggle="modal" data-target=".bs-example-modal-lg">
        @else
        <img src="" class="header_image" alt="aaa" data-toggle="modal" data-target=".bs-example-modal-lg">
        @endif

      </div>

      <div class="panel-body">
        <div class="row icons">
          <button class="btn icon-padding btn-simple btn-default btn-lg btn-block">
            <img src="https://png.icons8.com/ios/26/999999/home-filled.png"/>
          </br>
          {{ $property->type }}
        </button>

        @if($property->has_living_room===1)
        <button class="btn icon-padding btn-simple btn-default btn-lg btn-block">
          <img src="https://png.icons8.com/ios-glyphs/26/999999/living-room.png"/>
        </br>
        Living room
      </button>
      @endif

      @if($property->has_cleaning===1)
      <button class="btn icon-padding btn-simple btn-default btn-lg btn-block">
        <img src="https://png.icons8.com/ios/26/999999/housekeeping-filled.png"/>
      </br>
      Cleaning
    </button>
    @endif
  </div>

  <div class="row icons">
    <button class="btn icon-padding btn-simple btn-default btn-lg btn-block">
      <i class="fa fa-users"></i>
    </br>
    {{ $property->capacity }} House mates
  </button>

  @if($property->expenses_included===1)
  <button class="btn icon-padding btn-simple btn-default btn-lg btn-block">
    <a href="#popup1">
      <img src="https://png.icons8.com/ios-glyphs/26/999999/bill.png"/>
    </br>
  </a>
  Expenses

</button>
@endif

@if($property->has_cleaning===1)
<button class="btn icon-padding btn-simple btn-default btn-lg btn-block">
  <img src="https://png.icons8.com/metro/26/999999/washing-machine.png"/>
</br>
Washing Machine
</button>
@endif
</div>

<div id="popup1" class="overlay">
  <div class="popup">
    <a class="close" href="#">&times;</a>
    Expenses Included
  </br>
  <div class="col-md-1">
    <i class="fa fa-fw fa-check accepted"></i>Water
  </br>
  <i class="fa fa-fw fa-check accepted"></i>Light
</br>
<i class="fa fa-fw fa-check accepted"></i>Gas
</br>
<i class="fa fa-fw fa-check accepted"></i>Internet
</div>
</div>
</div>

<div class="col-md-4 col-sm-12" style="padding:0px;">
  <div class="panel panel-default" style="box-shadow: none;border: 1px solid #cbcbcb;border-radius:0px;border-right:none;border-bottom:none;">
    <div class="panel-heading" style="background-color:#515151;border-radius:0px;color:#fff;text-align:center;">
      <h4>  {{ $property->price }}€ per month</h4>
    </div>
    <div class="panel-body" style="padding:15px;margin-top:0;">
      <button class="btn btn-success btn-lg" type="button" style="width:234px;font-size:18px;font-weight:500;display:block;margin-right:auto;margin-left:auto;border-radius:2px" data-toggle="modal" data-target="#modal-request">Request to Visit</button>
    </div>

    <div class="modal fade in" id="modal-request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>

            <h4 class="modal-title">Request visit</h4>

          </div>
          <div class="modal-body">

            <form method="post" action="{{route('request_visit', ['id'=> $property->id]) }}" >
              <div class="fom-group" style="margin-top:10px;">
                <input class="datepicker booking center-block" type="text" name="visit_date" id="request-date" style="width:234px;"/>
              </div>

              <div class="bootstrap-timepicker">
                <input class="booking center-block" id="timepicker5" name="visit_time" type="text" style="width:234px;">
                <i class="icon-time"></i>
              </div>

              <button class="btn btn-default btn-success btn-search-submit" type="submit">Request Visit</button>
              <input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- attack protection, laravel needs this to be used in routes otherwise fails -->


            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close
              <div class="ripple-container">
                <div class="ripple ripple-on ripple-out" style="left: 65.5781px; top: 19px; background-color: rgb(244, 67, 54); transform: scale(8.5);"></div>
              </div>
            </button>

          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<div class="col-md-8 col-sm-12" style="margin-top: 10px;">
  <p class="description">
    {{ $property->description }}
  </p>
</div>
</div>

<div class="panel-footer">
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <button class="btn  btn-simple btn-default btn-lg btn-block">
        <div class="pull-left">
          <i class="fa fa-bed"></i>
          @if ($property->type === "appartment") {{"Appartment"}} @elseif ($property->type === "single_room") {{"Single Room"}}  @elseif ($property->type === "double_room") {{"Double Room"}} @endif
        </div>

      </button>
    </div>

    <div class="col-md-3 col-sm-6">
      <button class="btn  btn-simple btn-default btn-lg btn-block">
        <div class="pull-left">

          <i class="fa fa-wifi"></i>
          Wifi
        </div>
      </button>
    </div>

    <div class="col-md-3 col-sm-6">
      <button class="btn  btn-simple btn-default btn-lg btn-block">
        <div class="pull-left">
          <i class="fa fa-bath"></i>
          {{ $property->number_wcs }} Bathroom
        </div>
      </button>
    </div>

    @if($property->expenses_included===1)
    <div class="col-md-3 col-sm-6">
      <button class="btn  btn-simple btn-success btn-lg btn-block">
        <div class="pull-left">
          <i class="fa fa-dollar">
          </i>
          Expenses Included
        </div>
      </button>
    </div>
    @endif

    <div class="col-md-3 col-sm-6">
      <button class="btn  btn-simple btn-default btn-lg btn-block">
        <div class="pull-left">
          <i class="fa fa-university"></i>
          Distance to university
        </div>
      </button>
    </div>

  </div>
</div>
</div>


<div class="row" style="margin-left:0px;margin-right:0px;">
  <div style="width: 100%; height: 500px;">
    {!! Mapper::render() !!}
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
      <!-- TODO; Insert footer here or delete this div -->
    </div>
  </div>

</div>
</div>

</div>
@endsection
