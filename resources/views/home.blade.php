@extends('layouts.app')

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
            <div class="row">
            	<div class="col-md-6 col-md-offset-3">
            	   <h3 class="title text-center">Find your home today</h1>
                </div>
    	    </div>

	<div class="col-md-6 col-md-offset-3 search-wrapper">
			<form  action="{{url('search')}}" method="post">
			        <div class="input-group">
		               	    <input type="text" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" class="form-control search" name="my_search_data" />
				        <span class="input-group-addon">
                                    <button class="btn btn-default btn-success btn-search-submit" type="submit">Search</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/> <!-- attack protection, laravel needs this to be used in routes otherwise fails -->
				        </span>

                                </div>
                        </form>
	    	</div>
	    </div>
        </div>
    </div>

    <div class="main" id="properties">
       	<div class="container products-container">
            <ul class="categories-list">
            	<li class="{{ Request::is('home') ? 'active' : null}}">
                    <a href="{{route('home')}}">
                    	<span>All Rooms</span>
                    </a>
            	</li>

                <li class="{{ Request::is('single_bed') ? 'active' : null}}">
                    <a href="{{route('single_bed')}}">
                    	<span>Single Room</span>
                    </a>
                </li>
                <li class="{{ Request::is('double_bed') ? 'active' : null}}">
                    <a href="{{route('double_bed')}}">
                    	<span>Double Room</span>
                    </a>
            	</li>
            	<li class="{{ Request::is('comfort') ? 'active' : null}}">
                    <a href="{{route('comfort')}}">
                    	<span>Comfort</span>
                    </a>
            	</li>
            	<li class="{{ Request::is('bargain') ? 'active' : null}}">
                    <a href="{{route('bargain')}}">
                    	<span>Bargain</span>
                    </a>
            	</li>
            	<li class="{{ Request::is('expenses_included') ? 'active' : null}}">
                    <a href="{{route('expenses_included')}}">
                    	<span>Expenses included</span>
                    </a>
            	</li>
         	<div class="clearfix"></div>
	    </ul>
	</div>
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
	        {{ $properties->links() }}
		</div>

           </div>
	</div>
    </div>
</div>
@endsection
