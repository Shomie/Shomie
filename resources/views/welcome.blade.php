<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>shomie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/styles.css">

    </head>
    <body>
	<header>	
	<h2><a href="#"><span style="color: LimeGreen; font-size: 1.5em;">S</span><span style="color : white; font-size: 1.5em; ">HOMIE</span></a></h2>
        <div class="flex-center position-ref full-height">
		
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
			</div>
	</header>

			
	<section class="hero">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>	
		<h1>ENTER YOUR <strong>EXPERIENCE</strong></h1>
		<h1>IN THE BEST WAY</h1>		
		<br>
		<br>
		<a href="{{ url('/home') }}" class="btn">Book a visit</a>
	</section>
	
	<section class="features">
		<h3 class="title">How to discover your next cozy room</h3>		
		
		<ul class="grid">
			<li>
				<img src="/img/assets/explore.png" width="200" height="280">				
			</li>
			<li>
				<img src="/img/assets/book.png" width="200" height="280">					
			</li>
			<li>
				<img src="/img/assets/pay.png" width="200" height="280">				
			</li>
			<li>
				<img src="/img/assets/welcome.png" width="200" height="280">				
			</li>
		
	</section>
	
	<section class="contact">
		
		<h3 class="title1">Your dream <strong>room</strong> is just a click away</h3>	
		<h4 class="title1">Are you ready to be a Shomie?</h4>			
		<form>		
			<a href="{{ url('/home') }}" class="btn">Book a visit</a>
		</form>
		
	</section>

	<footer>
		<ul>
			<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
			<li><a href="#"><i class="fa fa-snapchat-square"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
			<li><a href="#"><i class="fa fa-github-square""></i></a></li>
		</ul>
		<p>Shomie &copy;</p>	
	</footer>
    </body>
</html>
