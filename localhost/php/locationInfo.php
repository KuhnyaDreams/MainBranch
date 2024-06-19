<div class="location-info not-visible" id='locationInfoBlock'>
    <div onclick="closeMore()" style="position:absolute; right:10px; top:10px; background:#FFF; border-radius:50px; width:30px; height:30px;"><img  src="../img/close.svg" style="cover:fit;"> </div>
    <span id='locationID' style="display:none;"></span>
    <div class="location-image" >
        <img width="380px" height="200px" alt="картинка достопримечательности" src="" id="locationInfoImage">
    </div>
    <div class="location-info-text">
        <h1 class='location-info-name' id="locationInfoName"></h1>
        <span class='location-info-tags' id="locationInfoTags"></span>
        <div class="location-buttons">
            <div class="buttons-tab" id="descButtons">
                <div class="button-item" id="address"><span>Маршрут</span></div>
                <div class="button-item" id="desc"><span>Обзор</span></div>
                <div class="button-item" id="schedule"><span>Расписание</span></div>
            </div>
            <div class="buttons-square">
                <div class="button-square" style="display:flex;align-items:center;justify-content: center;" id='addToWish'><img src="../img/clock.png" style='cover:fit; '></div>
                <div class="button-square" style="display:flex;align-items:center;justify-content: center;" id='addToFav'><img src="../img/lovely.png" style='cover:fit;'></div>
            </div>
        </div>   
        <div class="location-info-desc"><span id="locationInfoDesc"></span></div>
    </div>
</div>