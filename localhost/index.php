<!DOCTYPE html>
<html lang='ru'>

    <head>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=c472441-ed32-4bed-a362-addea55b0252&lang=ru_RU" type="text/javascript">
        </script>
        <link href="./css/styles.css" rel="stylesheet">
        <script src="./js/jquery.js" ></script>
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
        </div>
    </body>

    <script type="text/javascript">
        ymaps.ready(init);

        var myMap,
            fullScreen = true;

        function init () {
            myMap = new ymaps.Map('map', {
                center: [56.83745,60.59765],
                zoom: 14,
                controls: []
            });
        }
        myMap.container.fitToViewport();
    </script>

</html>
