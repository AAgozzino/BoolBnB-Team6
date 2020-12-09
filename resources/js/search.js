const $ = require("jquery");
var places = require('places.js');
const Handlebars = require("handlebars");
$(document).ready(function(){
   
    // CHIAMATA AJAX - RICERCA CON FILTRI
    $('#search-advance').submit(function(e){
        e.preventDefault();
        
        var serv_id = [];
        $("input:checkbox[name=service_id]:checked").each(function(){
            serv_id.push(parseInt($(this).val()));
        });
        
        $.ajax(
            {
                "url": "http://localhost:8000/api/houses",
                "method": "GET",
                "data" : {
                    "lat" : $("#latitude").val(),
                    "lon" : $("#longitude").val(),
                    "radius" : $(".radius_radio").val(),
                    "price" : $("#price").val(),
                    "guests" : $("#guests").val(),
                    "rooms" : $("#rooms").val(),
                    "bedrooms" : $("#bedrooms").val(),
                    "beds" : $("#beds").val(),
                    "services" : serv_id
                },
                "success": function (data) {
                    $('#houses-list').html("");
                    renderHouse(data.response);
                    // console.log(data);
                },
                "error": function (error) {
                    alert("ERRORE!");
                }
            }
        );
    });

});
    
// FUNZIONE TEMPLATE HOUSE
function renderHouse(data) {

    var source = $('#houses-template').html();
    var template = Handlebars.compile(source);

    for (var i = 0; i < data.length; i++) {
        
        var house = data[i];
        var html = template(house);

        $('#houses-list').append(html);
    }
} 

