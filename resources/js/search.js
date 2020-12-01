const $ = require("jquery");
var places = require('places.js');
const Handlebars = require("handlebars");

$(document).ready(function(){
    // callHouses();
    var latlong = [];
    // searchHouses();
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
            
        });

        placesAutocomplete.on('clear', function () {
            $address.textContent = 'none';
        });         
    })();

    function searching() {
        // searchbarr = $('#address-input').val();
        searchHouses();
        console.log(latlong);
        
    }

    $('#address-input').keydown(
        function(e){
            if (e.which == 13){
                searching();
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
        $("#address-input").on("keyup", function(){
            
            var input = $(this).val();

            $.ajax(
                {
                    "url": "http://localhost:8000/api/houses",
                    "method": "GET",
                    "data": {
                        'latitudine': latlong[0],
                        'longitudine': latlong[1],
                        'search':input
                    },
                    "success": function (data) {
                        
                        // renderHouse(data);
                        
                        var distanza ;
                        console.log('le latitudini e le longitudini sono:');
                        for (i = 0; i < data.length; i++){
                            var lat = data[i].latitude;
                            var lon = data[i].longitude;
                            console.log(lat, lon, i);

                            distanza = distance(lat, lon, latlong[0], latlong[1]);   
                            
                            console.log(distanza); 
                        }
                    
                                               
                    },
                    "error": function (error) {
                        alert("ERRORE!");
                    }
                }
            );
        });
        
    }


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


// ------------Distanza tra due punti--------------

function distance(lat1, lon1, lat2, lon2,) {
    if ((lat1 == lat2) && (lon1 == lon2)) {
        var dist = 0;
        return dist;
    }
    else {
        var radlat1 = Math.PI * lat1 / 180;
        var radlat2 = Math.PI * lat2 / 180;
        var theta = lon1 - lon2;
        var radtheta = Math.PI * theta / 180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
            dist = 1;
        }
        dist = Math.acos(dist);
        dist = dist * 180 / Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1.609344; 
        
        return dist;
        
        
    }
}