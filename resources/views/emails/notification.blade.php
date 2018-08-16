<!DOCTYPE html>
<html>
<head>
  <title>Shomie</title>
</head>
<body>
  <h1>Hello {{$user_name}}</h1>
	 <br>
	 <p>Your visit is booked for <strong>{{$visit_date}}</strong> at <strong>{{$visit_time}}</strong></p>
	 <br>
     <p><strong>Address</strong>: {{ $property_address}} {{ $property_floor}} {{ $property_number}}</p> 
	 <br>
	 <!--<p><strong>Price</strong>: </p>-->
	 <br>
	 <p><strong>Property id</strong>: {{ $property_id}}.</p>
	 <br>
	 
	 <p>You will get a FREE welcome dinner if you rent one of our properties! Please give us the feedback of your visit (on the button below) 
	 and help us to improve the service for the upcoming students. </p>
	 
     <p>The link is at the bottom of this e-mail. Do not hesitate to contact us if you have any questions! We will promptly help you.</p>
	 
	 <br> 
	 <p>Kind regards, shomie team.</p>
  <div style="padding-top:10px;padding-bottom:10px;">
    <form action="https://docs.google.com/forms/d/e/1FAIpQLSdNhVo-1tsaIX6ydao9yAipq53lQ1jNJdzT2m2ba3mou_uriA/viewform?c=0&w=1&edit2=2_ABaOnufzKb-drS1VJ1kz1YHUC8LmVs1SUxEIhQMkpOgkCIoNXDRx-NLzvQ">
      <input type="submit" value="Survey Feedback" />
    </form>
  </div>
</body>

</html>
