let locationImage = document.getElementById('locationInfoImage');
let locationName = document.getElementById('locationInfoName');
let locationTags = document.getElementById('locationInfoTags');
let locationDesc = document.getElementById('locationInfoDesc');
let locationinfoID = document.getElementById('locationID');
let locationBlock = document.getElementById('locationInfoBlock');
let descButtons = document.getElementById('descButtons').querySelectorAll('.button-item');
let addressButton = document.getElementById('address');
let descButton = document.getElementById('desc');
let scheduleButton = document.getElementById('schedule');

let addToFav = document.getElementById('addToFav');
let addToWish = document.getElementById('addToWish');

let favList = document.getElementById('favList');
let wishList = document.getElementById('wishList');
var previousPin;
var delay=0;

var timer ;

function openMore(locationId){
    for (let b of descButtons){
        b.querySelector('span').classList.remove('active');
    }
    locationDesc.textContent='';
    delay = 0; 
    if (delay < 20){
        timer = setInterval(function(){
            delay++;
            if (delay>=20)
            {
                clearInterval(timer); 
                locationBlock.style.outline = '1px black solid';
            }
        }, 100);
    }

    locationBlock.classList.remove('not-visible');
    if (previousPin != locationId) {
        previousPin = locationId
        loadNew(locationId);
    } 
}

locationBlock.onmouseover=function(){
    locationBlock.style.outline = '1px black solid';
    locationBlock.classList.remove('not-visible');
};
$('#map').click(function() {
    locationBlock.classList.add('not-visible'); 
    locationBlock.style.outline = 'none';
    clearInterval(timer); 
});
$('#locationInfoBlock').click(function(event){
    event.stopPropagation();
});
$('.landmark').click(function(event){
    event.stopPropagation();
});
$('.leaflet-marker-pane').click(function(event){
    event.stopPropagation();
    delay = 20;
});

function loadNew(locationId){
    $.ajax({
        type: "POST",
        url: '../php/loadPinInfo.php',
        data: {pin_id:locationId},
        success: function (response) {
            locationinfoID.textContent = response[0];
            locationImage.src=response[4];
            locationName.textContent=response[1];
            locationTags.textContent=response[7];
            addressButton.onclick = function(){
                for (let b of descButtons){
                    b.querySelector('span').classList.remove('active');
                }
                addressButton.querySelector('span').classList.add('active');
                locationDesc.textContent=response[6];
            };
            descButton.onclick = function(){
                for (let b of descButtons){
                    b.querySelector('span').classList.remove('active');
                }
                descButton.querySelector('span').classList.add('active');
                locationDesc.textContent=response[3];
            };
            scheduleButton.onclick = function(){
                for (let b of descButtons){
                    b.querySelector('span').classList.remove('active');
                }
                scheduleButton.querySelector('span').classList.add('active');
                locationDesc.textContent=response[5];
            };  
        },
        error: function(){
            console.log('eeror');
        },
    });
}
function closeMore(){
    if (delay < 20){
        locationBlock.style.outline = 'none';
        locationBlock.classList.add('not-visible'); 
        clearInterval(timer);
        delay = 0;
    }
}

addToFav.onclick = function(){
    console.log(locationinfoID.textContent);
    if(getCookie('userID')!==null){
        $.ajax({
            type: "POST",
            url: '../php/addToFavourites.php',
            data: {user:getCookie('userID'),pin_id:locationinfoID.textContent},
            success: function (response) {
                favList.innerHTML = "";
                response.forEach(element => {
                    var div = document.createElement('div');
                    div.innerHTML=`<div class='landmark' onclick='openMore(`+element[0]+`)'>
                        <div class='landmark-info'>  
                            <div class='landmark-name'>
                                <div>`+element[1]+`</div>
                            </div>

                            <div class='landmark-description'>
                                <div>`+element[7]+`</div>
                            </div>

                            <div class='landmark-misc'>
                                <div>`+element[5]+element[6]+`</div>
                            </div>
                        </div>
                        <img class='photo-landmark' src='`+element[4]+`' alt='photo landmark' width='166px' height='110px'>
                    </div>`;
                    favList.appendChild(div);
                });
            },
        });
    }
}
addToWish.onclick = function(){
    console.log(locationinfoID.textContent);
    if(getCookie('userID')!==null){
        $.ajax({
            type: "POST",
            url: '../php/addToWishlist.php',
            data: {user:getCookie('userID'),pin_id:locationinfoID.textContent},
            success: function (response) {
                wishList.innerHTML = "";
                response.forEach(element => {
                    var div = document.createElement('div');
                    div.innerHTML=`<div class='landmark' onclick='openMore(`+element[0]+`)'>
                        <div class='landmark-info'>  
                            <div class='landmark-name'>
                                <div>`+element[1]+`</div>
                            </div>

                            <div class='landmark-description'>
                                <div>`+element[7]+`</div>
                            </div>

                            <div class='landmark-misc'>
                                <div>`+element[5]+element[6]+`</div>
                            </div>
                        </div>
                        <img class='photo-landmark' src='`+element[4]+`' alt='photo landmark' width='166px' height='110px'>
                    </div>`;
                    wishList.appendChild(div);
                });  
            },

        });
    }
}