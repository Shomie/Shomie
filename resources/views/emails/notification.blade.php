<!DOCTYPE html>
<html>
<head>
  <title>Shomie</title>
</head>
<body>
  <h1>Hello {{$user_name}}</h1>
    Your visit is booked for {{$visit_date}} at {{$visit_time}}
     in {{ $property_address}} {{ $property_floor}} {{ $property_number}} (property id: {{ $property_id}}).
      You will get a FREE welcome dinner if you rent one of our properties! Just give us your feedback after the visit.
      The link is at the bottom of this e-mail. Do not hesitate to contact us if you have any questions! We will promptly help you.
  <div style="padding-top:10px;padding-bottom:10px;">
    Visit ID: {{$id}}
    <form action="https://docs.google.com/forms/d/e/1FAIpQLSdwpvB7TmN4Qqq1yAzmNoYpgz_I0IQ-locHefNWlESeLY4TjQ/viewform?entry.511438429&entry.919845951">
      <input type="submit" value="Survey Feedback" />
    </form>
  </div>
</body>

</html>
