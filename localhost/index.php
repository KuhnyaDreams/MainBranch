<!DOCTYPE html>
<html lang='ru'>

    <head>
        <?php include('html/links.html');?>
        <title>Kuhnya Maps</title>
    </head>

    <body>
        
        <?php
            //require_once('./php/connectToDB.php');
            include('./html/auth.html');
            include('./html/reg.html');
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
                    <img src="../img/profile.png" width="40px" height="40px" >
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
                    <?php include('html/profile.html');?>
                </div>
                <div class="route not-visible" id="route">
                    <?php include('html/route.html');?>
                </div>
                <div class="leaderboard not-visible" id="leaderboard">
                    <?php include('html/leaderBoard.html');?>
                </div>
                <div class="settings not-visible" id="settings">
                    <?php include('html/settings.html');?>
                </div>
            </div>
        </div>
        <div class="searchbar" >
            <input type="text" placeholder="Поиск достопримечательностей" name="search" class="searchbar-input" id="searchbar">
            <div class="search-img">
                <div ><img  src="../img/search.png"></div>
                <div class='vert-line'></div>
                <div onclick="CleanInput()"><img  src="../img/close.svg" width ="28px" height="28px"> </div>
            </div>
        </div>
        
        <div class="account" id="auth" onclick="ShowAuth()">
            <img  src="../img/profile.png" width="48px" height="48px">
        </div>
        
    </body>
    <script src="../js/authWindowScript.js"></script>
    <script src="../js/vertMenu.js"></script>
    <script src="../js/menuButtons.js"></script>
    <script src="../js/profileButtons.js"></script>
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

    let search = document.getElementById('searchbar');
    function CleanInput(){
        search.value="";
    }
    </script>

</html>
