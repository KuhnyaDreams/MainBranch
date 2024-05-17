var lat = 56.83745;
var lon = 60.59765;
function GetLoc()
{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);     
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function success(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
}
var map = L.map('map', {attributionControl: false, zoomControl: false }).setView([lat, lon], 13);

var myAttrControl = L.control.attribution().addTo(map);
myAttrControl.setPrefix('<a href="https://leafletjs.com/">Leaflet</a>');

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, under <a href="https://opendatacommons.org/licenses/odbl/">ODbL.</a>'
}).addTo(map);