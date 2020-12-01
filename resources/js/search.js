const $ = require("jquery");
var places = require('places.js');
const Handlebars = require("handlebars");

$(document).ready(function(){
    // callHouses();
    var latlong = [];

    (function () {
        
        var placesAutocomplete = places({
            appId: 'plMMPUODJ2PK',
            apiKey: '0337776886165fd5d9d75984ac961fa9',
            container: document.querySelector('#address-input')
        });

        var $address = document.querySelector('#address-value');

        placesAutocomplete.on('change', function (e) {
            $address.textContent = e.suggestion.value
            var latitudine = e.suggestion.latlng.lat;
            //var inputLat = $("#latitude").val(latitudine);
            //console.log(latitudine);
            var longitudine = e.suggestion.latlng.lng;
            //var inputLng = $("#longitude").val(longitudine);
            //console.log(longitudine);

            latlong = [];
            latlong.push(latitudine);
            latlong.push(longitudine);
            console.log(latitudine);
            console.log(longitudine);
            
        });

        placesAutocomplete.on('clear', function () {
            $address.textContent = 'none';
        });         
    })();

    function search() {
        searchbarr = $('#address-input').val();
        searchHouses(searchbarr);
        console.log(latlong);
    }

    $('#address-input').keydown(
        function(e){
            if (e.which == 13){
                search();
            }
        }
    );



// ------------Chiamate----------    

    // function callHouses(searchbarr){
    //     $.ajax(
    //         {
    //             "url": "http://localhost:8000/api/houses",
    //             "method": "GET",
    //             "data": {
    //                 'latitudine': latitudine,
    //                 'longitudine': longitudine,
    //                 'query': searchbarr
    //             },
    //             "success": function (data) {
                    
    //             //     for (i = 0; i < data.length; i++){
    //             //         if (searchbarr == data[i].address)
    //             //         {
    //             //             renderHouse(data);
    //             //         }
    //             //     }
    //             },
    //             "error": function (error) {
    //                 alert("ERRORE!");
    //             }
    //         }
    //     );
    // };

    function searchHouses() {
        $.ajax(
            {
                "url": "http://localhost:8000/api/houses",
                "method": "GET",
                "data": {
                    'latitudine': latlong[0],
                    'longitudine': latlong[1],
                },
                "success": function (data) {
                    console.log('gli indirizzi sono:');
                    console.log(data);
                    console.log(latlong);
                    
                },
                "error": function (error) {
                    alert("ERRORE!");
                }
            }
        );
    };


});    


// -------------Handlebars------------------

function renderHouse(data) {
    var source = $('#houses-template').html();
    var template = Handlebars.compile(source);

    for (var i = 0; i < data.length; i++) {
        
        var house = data[i];
        var html = template(house);

        $('#houses-list').append(html);
    }
} 

