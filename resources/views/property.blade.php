

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


<div class="picture" itemscope itemtype="http://schema.org/ImageGallery">

  @foreach($images as $key => $image)
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


<div class="wrapper" style="background-color:white;">
  <div class="container container-full">

    <div class="panel panel-default ">
      <div class="panel-heading" style="padding:0;">

        @if(!empty($images))
        <img src="/{{ $images[0] }}" id="main_trigger" class="header_image" alt="aaa">
        @else
        <img src="" class="header_image" id="main_trigger" alt="aaa">
        @endif

      </div>

      <div class="panel-body">
        <div class="col-md-8 col-sm-12" style="margin-top: 10px;">
          <p class="description">
            {{ $property->description }}
          </p>
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

@endsection
