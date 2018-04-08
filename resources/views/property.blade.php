

@extends('layouts.app')


@section('assets')
<link href="{{ URL::asset('/css/property.css') }}" rel="stylesheet"/>
<script src= "{{ URL::asset('/js/property.js') }}" type="text/javascript"></script>

<!-- Core CSS file -->
<link rel="stylesheet" href="{{ URL::asset('/photo_swipe/photoswipe.css') }}">

<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
In the folder of skin CSS file there are also:
- .png and .svg icons sprite,
- preloader.gif (for browsers that do not support CSS animations) -->
<link rel="stylesheet" href="{{ URL::asset('/photo_swipe/default-skin/default-skin.css') }}">

<!-- Core JS file -->
<script src="{{ URL::asset('/photo_swipe/photoswipe.min.js') }}" type="text/javascript"></script>

<!-- UI JS file -->
<script src="{{ URL::asset('/photo_swipe/photoswipe-ui-default.min.js') }}" type="text/javascript"></script>

@endsection


@section('content')
<body>

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

  <!-- Modal bellow -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Request visit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

          <!-- input with datetimepicker -->

          <div class="form-group">
            <label class="label-control">Date</label>
            <input type="text" id="calendarDate" class="form-control datetimepicker" style="cursor:pointer;"/>
          </div>

          <div class="form-group">
            <label class="label-control">Time</label>
            <input type="text" id="calendarTime" class="form-control datetimepicker" style="cursor:pointer;"/>
          </div>

        </div>
        <div class="modal-footer">

          <form method="post">
            <div class="form-group"> <!-- Submit button -->
              <button type="button" class="btn btn-primary btn-round btn-rose">
                Submit
              </button>
            </div>
          </form>

        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal above -->

<!-- Photo Swipe all objects creation. This shall be hidden from the user -->
<div class="picture" itemscope itemtype="http://schema.org/ImageGallery" style="display:none;">>

  @foreach($slider_images as $key => $image)
  <?php static $i = 0; ?>

  @if($i == 0)

  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
    <a id="main" href="/{{ $image }}" itemprop="contentUrl" data-size="1000x667" data-index="0">
      <img src="/{{ $image }}" height="400" width="600" itemprop="thumbnail" alt="Beach">
    </a>
  </figure>
  @else

  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
    <a href="/{{ $image }}" itemprop="contentUrl" data-size="1000x667" data-index="1">
      <img src="/{{ $image }}" height="400" width="600" itemprop="thumbnail" alt="">
    </a>
  </figure>

  @endif
  @endforeach
</div>

<!-- Photo Swipe Menus -->

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">

    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>

    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
      </button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
      </button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>


<div class="main">


  <div class="section">

    @if($property->availability !== "available")
    <div class="alert alert-danger">
      <div class="container">
        <div class="alert-icon">
          <i class="material-icons">error_outline</i>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="material-icons">clear</i></span>
        </button>
        <b>House not available:</b> This house is no longe available for booking visits. Somebody else got it first.
      </div>
    </div>
    @endif

    <div class="container">
      <!-- New code bellow -->

      <div class="row">


        <div class="col-12 col-md-7">

          <div class="card" style="height:500px;">

            <?php

            $image_search = "img/RoomsPics/". $property->id . "/main.{jpg,jpeg,gif,png,PNG,JPG}";
            $images = glob($image_search, GLOB_BRACE);

            if(count($images) == 0)
            {
              /* If the main image is not found search for one existing image */
              $image_search = "img/RoomsPics/". $property->id . "/*.{jpg,jpeg,gif,png,PNG,JPG}";
              $images = glob($image_search, GLOB_BRACE);
            }

            if(!empty($images))
            {
              echo "<img src='/$images[0]' id='main_trigger' alt='Room Image' class='header_image img-responsive'>";
            }
            else
            {
              echo "<img src='/img/not_available.jpg' id='main_trigger' alt='Room Image' class='header_image img-responsive'>";
            }
            ?>


            <div class="card-body">
              <p class="card-text">
                {{ $property->description }}
              </p>
              <div class="pull-right">
                <strong>{{ $property->price }}€ per month</strong>
              </div>
            </div>



          </div>



        </div>
        <div class="col-12 col-md-5">

          <div class="card" style="height:500px">
            <div class="card-body">
              <h4 class="card-title">Information</h4>
              <h6 class="card-title">{{$property->presentation}} {{$property->zone}}</h6>


              <div class="row">
                <div class="span12">

                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge">  <i class="fa fa-bed fa-lg" style="color:black;"></i></span>
                    @if ($property->type === "appartment")
                    Apartment
                    @elseif ($property->type === "single_room")
                    Single Room
                    @elseif ($property->type === "double_room")
                    Double Room
                    @else

                    @endif
                  </button>





                  @if($property->capacity>0)
                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge"> <i class="fa fa-users fa-lg" style="color:black;"></i></span>
                    {{$property->capacity}} Flatmates
                  </button>
                  @endif



                  @if($property->has_living_room===1)
                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge"> <i class="fa fa-tv fa-lg" style="color:black;"></i></span>
                    Living room
                  </button>

                  @endif



                  @if($property->washing_machine===1)
                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge"> <i class="fa fa-shopping-basket fa-lg" style="color:black;"></i></span>
                    Washing machine
                  </button>

                  @endif



                  @if($property->has_cleaning===1)
                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge"> <i class="fa fa-trash fa-lg" style="color:black;"></i></span>
                    Cleaning included
                  </button>

                  @endif



                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge">
                      @if($property->water===1)
                      <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                      @else
                      <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                      @endif
                    </span>
                    Water included
                  </button>





                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge">
                      @if($property->gas===1)
                      <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                      @else
                      <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                      @endif
                    </span>

                    Gas included
                  </button>


                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge">
                      @if($property->electricity===1)
                      <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                      @else
                      <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                      @endif
                    </span>
                    Electricity included
                  </button>


                  <button type="button" class="btn btn-secondary"  style="background-color:transparent;">
                    <span class="badge">
                      @if($property->internet===1)
                      <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                      @else
                      <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                      @endif
                    </span>

                      Internet included
                    </button>


                  </div>
                </div>
                  <!-- Room Features -->




                </div>
                <div class="card-footer">
                  <div class="text-center">
                    @if(Auth::user()->type != 1 && $property->availability == "available")
                    <button type="button" class="btn btn-primary btn-round btn-rose" data-toggle="modal" data-target="#exampleModal">
                      Book a visit
                    </button>
                    @else
                    <!-- If not a student or the house if not avauilable don't allow to book visits -->
                    @endif
                  </div>
                </div>


              </div>


            </div>


          </div>



        </div>

        <div class="container">

          <div class="row">
            <div class="col-sm-12">
              <div style=" height: 500px;">
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
