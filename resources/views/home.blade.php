@extends('layouts.app')

@section('assets')

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

          <li class="nav-item">
            <a class="nav-link btn text-white btn-rose" onclick="event.preventDefault(); $('#exampleModal').modal();" style="cursor:pointer;">Filter Options</a>
          </li>

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




  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter Options</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <form  action="{{route('search')}}" method="get">



                  <div class="col">
                    <div class="form-group">
                      <label for="sel1">Type of Room:</label>
                      <select class="form-control" id="sel1" name="options">
                        @if ($filteroptions === "all_rooms")
                        <option value="all_rooms" selected="selected">All Rooms</option>
                        @else
                        <option value="all_rooms">All Rooms</option>
                        @endif

                        @if ($filteroptions === "single_room")
                        <option value="single_room" selected="selected">Single Room</option>
                        @else
                        <option value="single_room">Single Room</option>
                        @endif

                        @if ($filteroptions === "double_room")
                        <option value="double_room" selected="selected">Double Room</option>
                        @else
                        <option value="double_room">Double Room</option>
                        @endif

                        @if ($filteroptions === "appartment")
                        <option value="appartment" selected="selected">Appartment</option>
                        @else
                        <option value="appartment" >Appartment</option>
                        @endif

                      </select>
                    </div>
                  </div>


                  <div class="col">

                    <div class="form-group">
                      <input type="hidden" id="min" class="form-control" name="min" value="{{ $min }}" readonly />
                    </div>

                    <div class="form-group">
                      <input type="hidden" id="max" class="form-control" name="max" value="{{ $max }}" readonly/>
                    </div>
                    <label id="price_label"></label>

                    <div id="sliderDouble" class="slider slider-info">

                    </div>

                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-rose btn-raised btn-round">
                      <i class="material-icons">search</i> Search
                    </button>
                  </div>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                </form>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>


  <div class="main">

    <div class="section">
      <div class="container">
        <div class="section">

          <div class="row">

            @foreach($properties as $key => $value)

            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card">

                <a href="{{ route('property', ['id'=> $value->id]) }}" target="_blank">

                  <?php

                  $image_search = "img/RoomsPics/". $value->id . "/*.{jpg,jpeg,gif,png,PNG,JPG}";
                  $images = glob($image_search, GLOB_BRACE);

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


                  <h5 class="card-title">{{$value->presentation}} {{$value->zone}}  </h5>


                  <h6 class="card-text mb-2 text-muted">{{ $value->description }}</h6>

                  <h5 class="card-title">
                    <span class="pull-right">
                      <strong>
                        <span class="price_title">
                          {{ $value->price }}€
                        </span>
                        per month
                      </strong>
                    </span>
                  </h5>
                </div>
              </div>

            </div>
            @endforeach

            <div class="col-12">
              <!-- To append other get variables -->
              {{ $properties->appends(request()->except('page'))->links() }}
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



<style>
.price_title {
  background-color: #fff;
  color: #FF084A;
  font-size: 15px;
  display: inline;
  opacity:0.9;
}
</style>


@endsection
