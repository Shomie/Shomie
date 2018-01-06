$(function() {
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 500,
    step: 10,
    values: [ $("#min").val(), $("#max").val() ],
    slide: function( event, ui ) {
      if(ui.values[ 0 ] + 50 > ui.values[ 1 ])
      {
        /* If minimum value is greater than maximum by a treshold don't allow */
        return false;
      }
      else {
        /* Any valid update change the values in the display */
        $("#min").val(ui.values[ 0 ]);
        $("#max").val(ui.values[ 1 ]);
        return true;
      }
    }
  });
});
