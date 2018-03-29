

@extends('layouts.app')


@section('assets')

<link href="{{ URL::asset('/datepicker/datepicker.css') }}" rel="stylesheet"/>
<script src= "{{ URL::asset('/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

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
							<div class="collapse navbar-collapse" id="navbarText">
								<ul class="navbar-nav">

									<li class="nav-item">
										<a class="nav-link" href="{{ route('erasmus_profile') }}">Profile
											<span class="sr-only">(current)</span>
										</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="{{ route('erasmus_main_menu') }}">Notifications
											<span class="sr-only">(current)</span>
										</a>
									</li>


									<li class="nav-item">
										<a class="nav-link" href="#">Side Menu Items</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Pricing</a>
									</li>
								</ul>

								<ul class="navbar-nav ml-md-auto d-md-flex">
	                    <li class="dropdown nav-item">
	                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
	                            <i class="material-icons">apps</i> Components
	                        </a>
	                        <div class="dropdown-menu dropdown-with-icons">
	                            <a href="../index.html" class="dropdown-item">
	                                <i class="material-icons">layers</i> All Components
	                            </a>
	                            <a href="http://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
	                                <i class="material-icons">content_paste</i> Documentation
	                            </a>
	                        </div>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
	                            <i class="material-icons">cloud_download</i> Download
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
	                            <i class="fa fa-twitter"></i>
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
	                            <i class="fa fa-facebook-square"></i>
	                        </a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
	                            <i class="fa fa-instagram"></i>
	                        </a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </nav>

<div class="container" style="display:none;">
  <div class="picture" itemscope itemtype="http://schema.org/ImageGallery">

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
</div>

<div class="wrapper" style="background-color:white;">
  <div class="container">

    <div class="panel panel-default ">
      <div class="panel-heading" style="padding:0;">

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
              @if(Auth::user()->type != 1 && $property->availability == "available")
              <button class="btn btn-success btn-lg" type="button" style="width:234px;font-size:18px;font-weight:500;display:block;margin-right:auto;margin-left:auto;border-radius:2px" data-toggle="modal" data-target="#modal-request">Request to Visit</button>
              @else
              <button class="btn btn-success btn-lg" type="button" style="width:234px;font-size:18px;font-weight:500;display:block;margin-right:auto;margin-left:auto;border-radius:2px">Request to Visit</button>
              @endif

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

                      <div class="form-group">
                      <div class="input-group date" id="timepicker5">
                          <input type="text" class="form-control" name="visit_date" id="request-date"  />	<span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                      </div>
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
                @if ($property->type === "appartment")
                <i class="fa fa-home"></i>
                  Apartment
                @elseif ($property->type === "single_room")
                <i class="fa fa-bed"></i>
                {{"Single Room"}}
                @elseif ($property->type === "double_room")
                <i class="fa fa-bed"></i>
                {{"Double Room"}}
                @endif
              </div>

            </button>
          </div>


          <div class="col-md-3 col-sm-6">
            <button class="btn  btn-simple btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">
              <div class="pull-left">
                <i class="fa fa-dollar">
                </i>
                Expenses Included
              </div>
            </button>
          </div>

          @if($property->capacity>0)
          <div class="col-md-3 col-sm-12">
            <button class="btn  btn-simple btn-default btn-lg btn-block">
              <div class="pull-left">
                <i class="fa fa-users"></i>
                {{$property->capacity}} Flatmates
              </div>
            </button>
          </div>
          @endif

          @if($property->has_living_room===1)
          <div class="col-md-3 col-sm-12">
            <button class="btn btn-simple btn-default btn-lg btn-block">
              <div class="pull-left">

                <i class="fa fa-tv"></i>
                Living room
              </div>
            </button>
          </div>
          @endif

          @if($property->washing_machine===1)
          <div class="col-md-3 col-sm-12">
            <button class="btn btn-simple btn-default btn-lg btn-block">
              <div class="pull-left">

                <i class="fa fa-shopping-basket"></i>
                Washing machine
              </div>
            </button>
          </div>
          @endif

          @if($property->has_cleaning===1)
          <div class="col-md-3 col-sm-12">
            <button class="btn btn-simple btn-default btn-lg btn-block">
              <div class="pull-left">

                <i class="fa fa-trash"></i>
                Cleaning House
              </div>
            </button>
          </div>
          @endif

          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Expenses Included</h4>
                </div>
                <div class="modal-body">
                  @if($property->water===1)
                  <i class="fa fa-fw fa-check accepted"></i>
                  Water
                  @else
                  <i class="fa fa-fw fa-times rejected"></i>
                  Water
                  @endif

                  @if($property->gas===1)
                  <i class="fa fa-fw fa-check accepted"></i>
                  Gas
                  @else
                  <i class="fa fa-fw fa-times rejected"></i>
                  Gas
                  @endif

                  @if($property->electricity===1)
                  <i class="fa fa-fw fa-check accepted"></i>
                  electricity
                  @else
                  <i class="fa fa-fw fa-times rejected"></i>
                  electricity
                  @endif

                  @if($property->internet===1)
                  <i class="fa fa-fw fa-check accepted"></i>
                  Internet
                  @else
                  <i class="fa fa-fw fa-times rejected"></i>
                  Internet
                  @endif
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
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
