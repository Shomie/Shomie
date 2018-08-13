$(function() {

var mySlider = document.getElementById('sliderDouble');
$("#price_label").text("Price: " + $("#min").val() + "€ - " + $("#max").val() + "€");

noUiSlider.create(mySlider, {
	start: [ parseInt($("#min").val()), parseInt($("#max").val())],
	connect: true,
  margin: 100,
  step: 10,
	range: {
		min:  0,
		max:  1000
	}
});

mySlider.noUiSlider.on('update', function(values, handle) {
  var whichHandle = handle === 0 ? 'LEFT' : 'RIGHT';
  if(whichHandle == 'LEFT')
  {
    $("#min").val(values[0]);
  }
  else {
    $("#max").val(values[1]);
  }

	$("#price_label").text("Price: " + $("#min").val() + "€ - " + $("#max").val() + "€");

});

});
