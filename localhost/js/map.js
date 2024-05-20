var lat = 56.83745;
var lon = 60.59765;
var map = L.map('map', {attributionControl: false, zoomControl: false });
function GetLoc()
{
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);     
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function success(position) {
    console.log('loaded');
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    map.setView([lat, lon], 13);
    $('#lat').text(lat);
    $('#lon').text(lon);
}

L.Routing.control({
    waypoints: [
      L.latLng(56.7826,60.6361),
      L.latLng(56.8408,60.6507)
    ],
    //serviceUrl: 'https://routing.openstreetmap.de/routed-foot/route/v1',
    routeWhileDragging: true
  }).addTo(map);
$('.leaflet-routing-container').hide();
var myAttrControl = L.control.attribution().addTo(map);
myAttrControl.setPrefix('<a href="https://leafletjs.com/">Leaflet</a>');

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, under <a href="https://opendatacommons.org/licenses/odbl/">ODbL.</a> <a href="http://www.openstreetmap.org/fixthemap">Некоректное отображение?</a>'
}).addTo(map);