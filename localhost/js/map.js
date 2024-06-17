var lat = 56.83745;
var lon = 60.59765;
var map = L.map('map', {attributionControl: false, zoomControl: false }).setView([lat, lon], 13);;
function GetLoc()
{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);     
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function openHover(e){
    openMore(e.target.options.id);
}
function closeHover(){
    closeMore();
}
function success(position) {
    if (position!=null){
        lat = position.coords.latitude;
        lon = position.coords.longitude;
    }
    map.setView([lat, lon], 13);
    $('#lat').text(lat);
    $('#lon').text(lon);
    $.ajax({
        type: "POST",
        url: '../php/loadPins.php',
        data: {},
        success: function (response) {
            for (var i = 0; i < response.length; i++) 
            {
                marker = new L.marker([response[i][0], response[i][1]],{id:response[i][2]})
                .on("mouseover", openHover).on("mouseout", closeHover)
                .addTo(map);
            }
        },
        error: function(){
            console.log('eeror markers');
        },
    });
}
/*
L.Routing.control({
    waypoints: [
      L.latLng(56.7826,60.6361),
      L.latLng(56.8408,60.6507)
    ],
    //serviceUrl: 'https://routing.openstreetmap.de/routed-foot/route/v1',
    routeWhileDragging: true
  }).addTo(map);
$('.leaflet-routing-container').hide();
*/


var myAttrControl = L.control.attribution().addTo(map);
myAttrControl.setPrefix('<a href="https://leafletjs.com/">Leaflet</a>');

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, under <a href="https://opendatacommons.org/licenses/odbl/">ODbL.</a> <a href="http://www.openstreetmap.org/fixthemap">Некоректное отображение?</a>'
}).addTo(map);