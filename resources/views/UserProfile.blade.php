
@extends('layouts.app')


@section('assets')
<link href="{{ URL::asset('/css/user_profile.css')}}" rel="stylesheet"/>
<script src= "{{ URL::asset('/js/user_profile.js') }}" type="text/javascript"></script>
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


<!-- User Profile Form -->


<!--
<div class="wrapper" style="background-color:rgba(255,255,255,0.6);">
<div class="container">

<div class="row"

<h3 class="title text-center"> User Profile </h3>


<form class="form" role="form">
{{ csrf_field() }}

<img src="{{ $user->avatar }}" alt="Trolltunga, Norway" width="200" height="200" style="border-radius: 50%;">
<input  type="file" placeholder="Change profile picture" name="picture" value="{{ old('picture')}}"/>



<div class="content">
<div class="input-group">
<span class="input-group-addon">
<i class="material-icons">account_box</i>
</span>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $user->name) }}" required autofocus>
@if ($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<div class="input-group">
<span class="input-group-addon">
<i class="material-icons">email</i>
</span>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

<input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" required>

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>
<div class="input-group">
<span class="input-group-addon">
<i class="material-icons">phone</i>
</span>

<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
<input id="name" type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number', $user->phone_number) }}" required autofocus>
@if ($errors->has('phone_number'))
<span class="help-block">
<strong>{{ $errors->first('phone_number') }}</strong>
</span>
@endif
</div>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
-->
<div class="wrapper" style="background-color:rgba(255,255,255,0.6);">

  <div class="container">
    <div class="row">
      <form class="myform">
        <div class="col-md-4">
          <img src="{{ $user->avatar }}" alt="Trolltunga, Norway" width="220" height="220" style="border-radius: 50%;">

          <input  type="file" placeholder="Change profile picture" name="picture" value="{{ old('picture')}}"/>

        </div>

        <div class="col-md-6">

          <div class="form-group col-lg-6">
            <label>Username</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
          </div>

          <div class="form-group col-lg-6">
            <label>Nationality</label>
            <input type="text" class="form-control" name="nationality" placeholder="Nationality" value="{{ $user->nationality }}">
          </div>

          <div class="form-group col-lg-12">
            <label>Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
          </div>

          <div class="form-group col-lg-6">
            <label>Age</label>
              <input type="text" class="form-control" name="age" placeholder="24" value="{{ $user->age }}">
          </div>

          <div class="form-group col-lg-6">
            <label>Phone Number</label>
              <input type="text" class="form-control" name="phone_number" placeholder="914 766 " value="{{ $user->phone_number }}">
          </div>




 </div>
        </form>
      </div>
    </div>
  </div>

</body>
@endsection
