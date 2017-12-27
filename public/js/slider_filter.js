$(function() {
  console.log( "ready!" );

    $( "#slider-range" ).slider({
     range: true,
     min: 0,
     max: 500,
     step: 10,
     values: [ 75, 300 ],
     slide: function( event, ui ) {
      if(ui.values[ 0 ] + 20 > ui.values[ 1 ])
      {
        /* If minimum value is greater than maximum by a treshold don't allow */
        return false;
      }
      else {
        /* Any valid update change the values in the display */
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        return true;
      }
     }
   });

   /* Default text to be displayed */
   $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
    " - $" + $( "#slider-range" ).slider( "values", 1 ) );
 });
