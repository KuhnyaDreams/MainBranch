<!DOCTYPE html>
<html lang='ru'>

    <head>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=3efb9e24-40bd-4aa0-95f8-3b8e1423f961&lang=ru_RU" type="text/javascript">
        </script>
        <link href="../css/styles.css" rel="stylesheet">
        <link href="../css/authstyles.css" rel="stylesheet">
        <script src="../js/jquery.js" ></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <title>Kuhnya Maps</title>
    </head>

    <body>
        
        <?php
            //require_once('./php/connectToDB.php');
            include('./php/auth.php');
            include('./php/reg.php');
        ?>
        
        <div id="map" class="ymaps-layers-pane"></div>
        
        <div class="menu" id="menu" onclick="ShowMenu()">
            <img src="../img/menu.svg" width="40px" height="40px" >
        </div>
        <div class = 'left-menu not-visible'>
            <div class = 'vertical-menu'>
                <div class="menu-button" id="route-button" onclick="ShowRoute()">
                    <img src="../img/menu.svg" width="40px" height="40px" >
                </div>
                <div class="menu-button" id="account-button" onclick="ShowAccount()">
                    <img src="../img/menu.svg" width="40px" height="40px" >
                </div>
                <div class="menu-button" id="leaderboard-button" onclick="ShowLeaderboard()">
                    <img src="../img/menu.svg" width="40px" height="40px" >
                </div>
                <div class="menu-button" id="settings-button" onclick="ShowSettings()">
                    <img src="../img/menu.svg" width="40px" height="40px" >
                </div>  
            </div>
            <div class="left-menu-content">
                <div class='profile not-visible' id='profile'>
                </div>
                <div class="route not-visible" id="route">
                </div>
                <div class="leaderboard not-visible" id="leaderboard">
                </div>
            </div>
        </div>
        <div class="searchbar" id="searchbar">
            <input type="text" placeholder="Поиск достопримечательностей" name="search" class="searchbar-input">
            <img class="search-img" src="../img/search.png">
        </div>
        
        <div class="account" id="auth" onclick="ShowAuth()">
            <img  src="../img/profile.png" width="48px" height="48px">
        </div>
        
    </body>
    <script src="../js/authWindowScript.js"></script>
    <script src="../js/vertMenu.js"></script>
    <script src="../js/menuButtons.js"></script>
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
    </script>

</html>
