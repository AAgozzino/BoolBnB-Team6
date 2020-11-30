const $ = require("jquery");
var places = require('places.js');
const Handlebars = require("handlebars");
$(document).ready(function(){
    // callHouses();

    (function () {
        
        var placesAutocomplete = places({
            appId: 'plMMPUODJ2PK',
            apiKey: '0337776886165fd5d9d75984ac961fa9',
            container: document.querySelector('#address-input')
        });

        var $address = document.querySelector('#address-value')
        placesAutocomplete.on('change', function (e) {
            $address.textContent = e.suggestion.value
            var latitudine = e.suggestion.latlng.lat;
            var inputLat = $("#latitude").val(latitudine);
            console.log(latitudine);
            var longitudine = e.suggestion.latlng.lng;
            var inputLng = $("#longitude").val(longitudine);
            console.log(longitudine);

            var latlong = [];
            latlong.push(latitudine);
            latlong.push(longitudine);

            console.log(latlong);

            return latlong;            

        });

        placesAutocomplete.on('clear', function () {
            $address.textContent = 'none';
        });

         
    })();

    function search() {
        searchbarr = $('#address-input').val();
        searchHouses(searchbarr);
    }

    $('#address-input').keydown(
        function(e){
            if (e.which == 13){
                search();
            }
        }
    );



    function callHouses(searchbarr){
        $.ajax(
            {
                "url": "http://localhost:8000/api/houses",
                "method": "GET",
                "data": {
                    // 'latitudine': latitudine,
                    // 'longitudine': longitudine,
                    'query': searchbarr
                },
                "success": function (data) {
                    
                    for (i = 0; i < data.length; i++){
                        if (searchbarr == data[i].address)
                        {
                            renderHouse(data);
                        }
                    }
                },
                "error": function (error) {
                    alert("ERRORE!");
                }
            }
        );
    };

    function searchHouses(searchbarr, latlong ) {
        $.ajax(
            {
                "url": "http://localhost:8000/api/houses",
                "method": "GET",
                "data": {
                    'latitudine': latlong[0],
                    'longitudine': latlong[1],
                    'query': searchbarr
                },
                "success": function (data) {
                    // console.log(data);
                    
                 
                    for (i = 0; i < data.length; i++) {
                        if (searchbarr == data[i].address) {
                            renderHouse(data);
                        }
                    }
                },
                "error": function (error) {
                    alert("ERRORE!");
                }
            }
        );
    };


});
    

function renderHouse(data) {
    var source = $('#houses-template').html();
    var template = Handlebars.compile(source);

    for (var i = 0; i < data.length; i++) {
        
        var house = data[i];
        var html = template(house);

        $('#houses-list').append(html);
    }
} 

