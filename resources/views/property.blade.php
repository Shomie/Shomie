

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
            <a class="nav-link" href="{{ route('home') }}">Search Room</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications</a>
          </li>

          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('landlord_main_menu') }}">Notificações</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Quartos
            </a>
            <div class="dropdown-menu" aria-labelledby="Preview">
              <a class="dropdown-item" href="{{ route('landlord_availability_rooms') }}">
                Mudar Disponibilidade
              </a>
            </div>
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




  <!-- Modal bellow -->

  <div class="modal fade" id="expensesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-danger" id="exampleModalLabel">Expenses Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-6">
                    <div class="well">
                      <h5>
                        <span class="label pull-right">
                          @if($property->water===1)
                          <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                          @else
                          <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                          @endif

                        </span>
                        Water included
                      </h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="well">
                      <h5>
                        <span class="label pull-right">
                          @if($property->water===1)
                          <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                          @else
                          <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                          @endif
                        </span>
                        Water included
                      </h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="well">
                      <h5>
                        <span class="label pull-right">
                          @if($property->gas===1)
                          <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                          @else
                          <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                          @endif
                        </span>
                        Gas included
                      </h5>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="well">
                      <h5>
                        <span class="label pull-right">
                          @if($property->internet===1)
                          <i class="fa fa-fw fa-check accepted fa-lg" style="color:black;"></i>
                          @else
                          <i class="fa fa-fw fa-times rejected fa-lg" style="color:black;"></i>
                          @endif
                        </span>
                        Internet included
                      </h5>
                    </div>
                  </div>
                </div><!--/row-->
              </div><!--/col-12-->
            </div><!--/row-->
          </div>

        </div>
        <div class="modal-footer">



        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal above -->


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

        <button class="btn btn-round btn-rose" onclick="
        event.preventDefault();
        document.getElementById('visit_date_id').value = document.getElementById('calendarDate').value;
        document.getElementById('visit_time_id').value = document.getElementById('calendarTime').value;
        document.getElementById('request_visit_form').submit();">
        Submit
      </button>

      <form method="post" id="request_visit_form" action="{{route('request_visit', ['id'=> $property->id]) }}" >
        {{ csrf_field() }}
        <div class="form-group"> <!-- Submit button -->
          <input type="hidden" id="visit_date_id" name="visit_date" value="">
          <input type="hidden" id="visit_time_id" name="visit_time" value="">
        </div>
      </form>

    </div>
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
              <div class="col-md-12 text-center">
                @if(Auth::user()->type != 1 && $property->availability == "available")
                <button type="button" class="btn btn-rose" data-toggle="modal" data-target="#exampleModal"><div class="ripple-container"></div>
                  Book a visit
                </button>
                @else
                <!-- If not a student or the house if not avauilable don't allow to book visits -->
                @endif
              </div>
            </div>
            <div class="card-footer">

            </div>



          </div>



        </div>
        <div class="col-12 col-md-5">

          <div class="card" style="height:500px">
            <div class="card-body">
              <h3 class="card-title">Information</h3>
              <h6 class="card-title">{{$property->presentation}} {{$property->zone}}</h6>

              <h6 class="card-title pull-right"><strong class="pull-right"><span class="price_title">{{ $property->price }}€</span> per month</strong></h6>

              <button class="btn btn-rose btn-sm pull-left text-white" data-toggle="modal" data-target="#expensesModal">
                <strong class="pull-left">
                  <i class="fa fa-info" style="padding-right:15px;"></i>Expenses
                </strong>
              </button>

              <div class="clearfix"></div>

              <hr>



              <div class="container">
                <div class="row">

                  <div class="col-12 col-md-6" style="padding-bottom:20px;">
                    <i class="fa fa-bed fa-lg" style="padding-right:20px;"></i>
                    <span>
                      @if ($property->type === "appartment")
                      Apartment
                      @elseif ($property->type === "single_room")
                      Single Room
                      @elseif ($property->type === "double_room")
                      Double Room
                      @else
                      @endif
                    </span>
                  </div>

                  @if($property->capacity>0)
                  <div class="col-12 col-md-6" style="padding-bottom:20px;">
                    <i class="fa fa-users fa-lg" style="padding-right:20px;"></i>
                    <span>
                      {{$property->capacity}} Flatmates
                    </span>
                  </div>
                  @endif

                  @if($property->has_living_room===1)
                  <div class="col-12 col-md-6" style="padding-bottom:20px;">
                    <i class="fa fa-tv fa-lg" style="padding-right:20px;"></i>
                    <span>
                      Living room
                    </span>
                  </div>
                  @endif

                  @if($property->washing_machine===1)
                  <div class="col-12 col-md-6" style="padding-bottom:20px;">
                    <i class="fa fa-shopping-basket fa-lg" style="padding-right:20px;"></i>
                    <span>
                      Washing machine
                    </span>
                  </div>
                  @endif

                  @if($property->has_cleaning===1)
                  <div class="col-12 col-md-6" style="padding-bottom:20px;">
                    <i class="fa fa-trash fa-lg" style="padding-right:20px;"></i>
                    <span name="text">
                      Cleaning included
                    </span>
                  </div>
                  @endif
                </div>
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
