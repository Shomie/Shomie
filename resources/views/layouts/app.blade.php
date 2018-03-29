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

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">




  <link rel="stylesheet" href="{{ URL::asset('/material-kit/css/material-kit.min.css?v=2.0.2')}}" />
  <link rel="stylesheet" href="{{ URL::asset('/css/global.css')}}" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  <script src="{{ URL::asset('/material-kit/js/core/jquery.min.js') }}" type="text/javascript"></script>

  <script src="{{ URL::asset('/material-kit/js/core/popper.min.js') }}" type="text/javascript"></script>

  <script src="{{ URL::asset('/material-kit/js/bootstrap-material-design.js') }}" type="text/javascript"></script>
  <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
  <script src="{{ URL::asset('/material-kit/js/plugins/moment.min.js') }}" type="text/javascript"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ URL::asset('/material-kit/js/plugins/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
  <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ URL::asset('/material-kit/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
  <script src="{{ URL::asset('/material-kit/js/material-kit.js?v=2.0.2') }}" type="text/javascript"></script>

  <script src= "{{ URL::asset('/js/global.js') }}" type="text/javascript"></script>


<!-- We needs to add assets can in their own blade file -->
@yield('assets')

</head>

@yield('content')



</body>
</html>
