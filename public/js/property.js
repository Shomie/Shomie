$(function() {

  var date_today = new Date();
  var day = date_today.getDate();
  var month = date_today.getMonth()+1; /* January is 0 */
  var year = date_today.getFullYear();

  if(day < 10){
    day = '0' + day;
  }
  if(month < 10){
    month = '0' + month;
  }
  var date_today = day+'/'+month+'/'+year;
  document.getElementById("request-date").value = date_today;

  $('#timepicker5').timepicker({
    showMeridian :false,
    defaultTime:'current',
  });


  $( "#request-date" ).datepicker({
    dateFormat: 'dd-mm-yy'
  });

});
