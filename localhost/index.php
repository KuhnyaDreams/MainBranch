<!DOCTYPE html>
<html lang='ru'>

    <head>
        <?php include('html/links.html');?>
        <title>Kuhnya Maps</title>
        <link rel="icon" href="favicon.png">
    </head>

    <body onload="GetLoc()">
        <?php
            include('html/auth.html');
            include('html/reg.html');
            include('html/addFriend.html');
            include('php/locationInfo.php');
        ?>
        
        <div id="map"></div>
        
        <div class="menu" id="menu" onclick="ShowMenu()">
            <img src="../img/menu.svg" width="40px" height="40px" >
        </div>
        <div class = 'left-menu not-visible'>
            <div class = 'vertical-menu'>
                <div class="menu-button" id="locations-button" onclick="ShowLocations()">
                    <img src="../img/route.svg" width="40px" height="40px" >
                </div>
                <div class="menu-button" id="account-button" onclick="ShowAccount()">
                    <img src="../img/profile.png" width="40px" height="40px" >
                </div>
                <div class="menu-button" id="leaderboard-button" onclick="ShowLeaderboard()">
                    <img src="../img/leaderboard.svg" width="40px" height="40px" >
                </div>
                <div class="menu-button" id="settings-button" onclick="ShowSettings()">
                    <img src="../img/settings.svg" width="40px" height="40px" >
                </div>  
            </div>
            <div class="left-menu-content">
                <div class='menu-content not-visible' id='locations'>
                    <?php include('php/locationsList.php');?>
                </div>
                <div class='menu-content not-visible' id='profile'>
                    <?php include('php/profile.php');?>
                </div>
                <div class="menu-content not-visible" id="route">
                    <?php include('html/route.html');?>
                </div>
                <div class="menu-content not-visible" id="leaderboard">
                    <?php include('php/leaderboard.php');?>
                </div>
                <div class="menu-content not-visible" id="settings">
                    <?php include('php/settings.php');?>
                </div>
                <div class="menu-content not-visible" id='anotherProfile'>
                    <?php include('php/anotherProfile.php');?>
                </div>
            </div>
        </div>
        <div class="searchbar" >
            <input type="text" placeholder="Поиск достопримечательностей" name="search" class="searchbar-input" id="searchbar">
            <div class="search-img">
                <div onclick="CleanInput('searchbar')"><img  src="../img/close.svg" width ="28px" height="28px"> </div>
            </div>
        </div>
        
        <div class="account" id="auth" onclick="ShowAuth()">
            <img  src="../img/profile.png" width="48px" height="48px">
        </div>
        
    </body>
     
    <script src="../js/map.js"></script>
    <script src="../js/mainFunctions.js"></script>
    <script src="../js/authWindowScript.js"></script>
    <script src="../js/vertMenu.js"></script>
    <script src="../js/menuButtons.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/profileButtons.js"></script>
    <script src="../js/locationInfo.js"></script>

</html>
