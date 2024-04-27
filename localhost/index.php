<!DOCTYPE html>
<html lang='ru'>

    <head>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=3efb9e24-40bd-4aa0-95f8-3b8e1423f961&lang=ru_RU" type="text/javascript">
        </script>
        <link href="./css/styles.css" rel="stylesheet">
        <link href="./css/authstyles.css" rel="stylesheet">
        <script src="./js/jquery.js" ></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="form-back visible" id="background">
            <?php

                include('./php/auth.php');
                include('./php/reg.php');
            ?>
        </div>
        <div id="map"></div>
        <div class="menu" id="menu">
            <img src="../img/profile.png" width="48px" height="48px">
        </div>
        <div class="searchbar" id="searchbar">
            <input type="text" placeholder="Поиск достопримечательностей" name="search" class="searchbar-input">
            <img class="search-img" src="../img/search.png">
        </div>
        <div class="account" id="auth" onclick="ShowAuth()">
            <img  src="../img/profile.png" width="48px" height="48px">
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
        ymaps.ready(init);
    }
    
    
    function init () {
        myMap = new ymaps.Map('map', {
            center: [lat,lon],
            zoom: 14,
            controls: []
        });
    }
    
    function ChangeToReg(){
        document.getElementById("authForm").className="inputform not-visible";
        document.getElementById("regForm").className="inputform visible";
    }
    function ChangeToAuth(){
        document.getElementById("regForm").className="inputform not-visible";
        document.getElementById("authForm").className="inputform visible";
    }
    function ShowAuth(){
        if (document.getElementById("background").className=="form-back visible")
        {
            document.getElementById("background").className="form-back not-visible";
            ChangeToAuth();
        }
        else
            document.getElementById("background").className="form-back visible";
        
    }

    </script>

</html>
