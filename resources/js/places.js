var places = require('places.js');

var placesAutocomplete = places({
    appId: 'plMMPUODJ2PK',
    apiKey: '0337776886165fd5d9d75984ac961fa9',
    container: document.querySelector('#address-input')
});
  
// placesAutocomplete.on('change', function () {
 
// });

$("#address-input").keydown(
  function(e) {
    if (e.which == 13) {
      searchPlace();
    }
  }
);


function searchPlace () {
  var search = $("#address-input").val();
  if (search != "") {
    $.ajax(
      {
        "url" :"/ajaxRequest",
        "data" : {
          "query" : search
        },
        "method" : "GET",
        "success" : function(data) {
          var dataResults = data.success;
          console.log(dataResults);
        },
        "error" : function(error) {
          // alert("errore");
        }
      }
    )
  }
}