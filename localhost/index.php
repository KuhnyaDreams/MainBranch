<!DOCTYPE html>
<html lang='ru'>

    <head>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=3efb9e24-40bd-4aa0-95f8-3b8e1423f961&lang=ru_RU" type="text/javascript">
        </script>
        <link href="../css/styles.css" rel="stylesheet">
        <script src="../js/jquery.js" ></script>
    </head>

    <body>
        <div class="maxMap" id="map"></div>
        <div class="interface" id="interface">
            <div>
                <img class="menu" src="img/placeholder.svg">
            </div>
            <div>
                <img class="account" src="img/placeholder.svg">
            </div>
            <p id="demo"></p>
        </div>
    </body>

    <script type="text/javascript">
    var lat = 56.83745;
    var lon = 60.59765;
    const x = document.getElementById("demo");
    window.addEventListener('load', function () {
        getLocation();
    });
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success);     
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    function success(position) {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        x.innerHTML = "Latitude: " + lat +
        "<br>Longitude: " + lon;
        ymaps.ready(init);
    }
    
    
    function init () {
        myMap = new ymaps.Map('map', {
            center: [lat,lon],
            zoom: 14,
            controls: []
        });
    }
    


    </script>

</html>
