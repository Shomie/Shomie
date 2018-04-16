$( document ).ready(function() {


  var dateNow = moment().format('YYYY-MM-DD');
  var timeNow = moment().format('YYYY-MM-DD hh:mm');

  $('#calendarDate').datetimepicker({
    format: 'DD/MM/YYYY',
    defaultDate: moment(),
    minDate: moment(),
    sideBySide: true,
    keepOpen: true,
    focusOnShow: false,
    ignoreReadonly: true,
    icons: {
      previous: 'fa fa-chevron-left',
      next: 'fa fa-chevron-right',
    }
  }).on('dp.show', function (e) {
    $(e.target).on('mousedown', function (e) {
      $(e.target).data("DateTimePicker").hide();
      e.preventDefault();
    });
  }).on('dp.hide', function (e) {
    $(e.target).off('mousedown');
  });

  $('#calendarTime').datetimepicker({
    format: 'hh:mm',
    defaultDate: moment(),
    sideBySide: true,
    keepOpen: true,
    focusOnShow: false,
    ignoreReadonly: true,
    icons: {
      up: "fa fa-chevron-up",
      down: "fa fa-chevron-down"
    }
  }).on('dp.show', function (e) {
    $(e.target).on('mousedown', function (e) {
      $(e.target).data("DateTimePicker").hide();
      e.preventDefault();
    });
  }).on('dp.hide', function (e) {
    $(e.target).off('mousedown');
  });



  $('#main_trigger').on('click', function(event){
    event.preventDefault();


    console.log("OLA");


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
