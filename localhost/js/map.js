var lat = 56.83745;
var lon = 60.59765;
var route;
var LeafIcon = L.Icon.extend({
    options: {
       iconSize:     [50, 60],
       shadowSize:   [45, 50],
       iconAnchor:   [17, 60],
       shadowAnchor: [3, 58],
       popupAnchor:  [-3, -76]
    }
});
var UserIcon = L.Icon.extend({
    options: {
       iconSize:     [40, 40],
       shadowSize:   [0, 0],
       iconAnchor:   [20, 40]
    }
});
var customIcon = new LeafIcon({
    iconUrl: '../img/ICONnew.png',
    shadowUrl:'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png'
})
var userMarkerIcon = new UserIcon({
    iconUrl: '../img/userMarker.png',
})


var map = L.map('map', {attributionControl: false
    ,zoomControl: false }).setView([lat, lon], 13);

var markers = [];
map.createPane('userMarker');
map.getPane('userMarker').style.zIndex=1000;
map.createPane('pinsMarkers');
map.getPane('pinsMarkers').style.zIndex=800;

var userMarker = new L.marker(map.getCenter(),{id:'0',icon:userMarkerIcon, pane:'userMarker'}).addTo(map);
markers.push(userMarker);
function GetLoc()
{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success);     
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function success(position) {
    if (position!==null){
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        userMarker.setLatLng([lat,lon]);
        route = new L.Routing.control({
            waypoints: [
              markers[0].getLatLng(),null
            ],
            serviceUrl: 'https://routing.openstreetmap.de/routed-foot/route/v1',
            routeWhileDragging: false,
            draggableWaypoints:false,
            addWaypoints:false,
            show:false,
            showAlternatives:true
        }).addTo(map);
    }

    map.setView([lat, lon], 13);
    $('#lat').text(lat);
    $('#lon').text(lon);
    $.ajax({
        type: "POST",
        url: '../php/loadPins.php',
        data: {type:'markers'},
        success: function (response) {
            for (var i = 0; i < response.length; i++) 
            {
                var marker = new L.marker([response[i][0], response[i][1]],{id:response[i][2], icon:customIcon, pane:'pinsMarkers'})
                .on("click", function(event){
                    console.log('open'+event.target.options.id);
                    openMore(event.target.options.id);
                })
                .addTo(map);
                markers.push(marker);
            }
        },
        error: function(){
            console.log('eeror markers');
        },
    });
}


$('.leaflet-routing-container').hide();



var myAttrControl = L.control.attribution().addTo(map);
myAttrControl.setPrefix('<a href="https://leafletjs.com/">Leaflet</a>');

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, under <a href="https://opendatacommons.org/licenses/odbl/">ODbL.</a> <a href="http://www.openstreetmap.org/fixthemap">Некоректное отображение?</a>'
}).addTo(map);