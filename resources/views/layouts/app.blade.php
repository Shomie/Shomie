<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{URL::asset('/img/favicon.png')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'shomie') }}</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset('/css/material-kit.css')}}" rel="stylesheet"/>

      <!--   Core JS Files   -->
        <script src= "{{ URL::asset('/js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('/js/material.min.js') }}" type="text/javascript"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ URL::asset('/js/nouislider.min.js') }}" type="text/javascript"></script>

        <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
        <script src="{{ URL::asset('/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

	<script src="{{ URL::asset('/js/bootstrap-timepicker.js') }}" type="text/javascript"></script>

        <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
        <script src="{{ URL::asset('/js/material-kit.js') }}" type="text/javascript"></script>

<!-- Who needs to add assets can in their own blade file -->
        @yield('assets')

</head>

        @yield('content')



</body>
</html>
