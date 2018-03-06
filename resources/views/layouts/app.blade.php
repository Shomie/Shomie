<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/img/logo/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{URL::asset('/img/logo/favicon.png')}}">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'shomie') }}</title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


  <!-- Jquery + Popper + Bootstrap v4.0.0 -->
  <script src="{{ URL::asset('/js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('/js/popper.min.js') }}" type="text/javascript"></script>




  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Material Kit -->

  <link rel="stylesheet" href="{{ URL::asset('/material-kit/css/material-kit.min.css') }}">
  <script src= "{{ URL::asset('/material-kit/js/material-kit.min.js') }}" type="text/javascript"></script>
  <script src= "{{ URL::asset('/material-kit/js/bootstrap-material-design.min.js') }}" type="text/javascript"></script>


<!-- We needs to add assets can in their own blade file -->
@yield('assets')

</head>

@yield('content')



</body>
</html>
