function showhide()
      {
          var div = document.getElementById("detail");
          if (div.style.display !== "none") {
              div.style.display = "none";
          }
          else {
              div.style.display = "block";
          }
          $(detail).removeClass('hidden');
          $(change_detail).addClass('hidden');
          $(available).addClass('hidden');
      }
function showdetails()
{

    var div = document.getElementById("change_detail");

    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }
      $(change_detail).removeClass('hidden');
      $(detail).addClass('hidden');
      $(available).addClass('hidden');
}

function showchange()
{
    var div = document.getElementById("available");
    if (div.style.display !== "none") {
        div.style.display = "none";
    }
    else {
        div.style.display = "block";
    }

    $(available).removeClass('hidden');
    $(change_detail).addClass('hidden');
    $(detail).addClass('hidden');
}
