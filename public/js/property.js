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


  $('#main_trigger').on('click', function(event){
    event.preventDefault();




$('#main').trigger( "click" );

  });


  $('.picture').each( function() {

    $(".picture").css("display", "none");


    var $pic     = $(this),
    getItems = function() {
      var items = [];
      $pic.find('a').each(function() {
        var $href   = $(this).attr('href'),
        $size   = $(this).data('size').split('x'),
        $width  = $size[0],
        $height = $size[1];

        var item = {
          src : $href,
          w   : $width,
          h   : $height
        }

        items.push(item);
      });
      return items;
    }

    var items = getItems();

    var $pswp = $('.pswp')[0];
    $pic.on('click', 'figure', function(event) {
      event.preventDefault();

      var $index = $(this).index();
      var options = {
        index: $index,
        bgOpacity: 0.7,
        showHideOpacity: true
      }

      // Initialize PhotoSwipe
      var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
      lightBox.init();
    });

  });






});
