
//Send a request to the web service to get a new access code for the main shop
function requestAccessCode() {
    
    $.ajax(
        {
            data: null,
            url: '?controlador=Items&accion=requestAccessCode',
            type: 'post',
            beforeSend: function () {
                $("#code").html("Requesting, \n\ wait a second...");
            },
            success: function (response) {
                $("#code").html(response);
            }
        }
    );
}//requestNewCode

function insertItem(item_name,price,description,image,category) {
  var param = {
      "item_name": item_name,
      "price": price,
      "description": description,
      "image": image,
      "category": category
  };

  $.ajax(
      {
          data: param,
          url: '?controlador=Items&accion=insertItem',
          type: 'post',
          beforeSend: function () {
              $("#insert_result").html("Inserting \n\ ...");
          },
          success: function (response) {
              $("#insert_result").html(response);

          },

      }
  );
}



/*Style*/
/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar-main").style.top = "0";
  } else {
    document.getElementById("navbar-main").style.top = "-100px";
  }
  prevScrollpos = currentScrollPos;
}

