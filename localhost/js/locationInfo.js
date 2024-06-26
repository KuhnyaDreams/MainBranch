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
let locList = document.getElementById('locList');
let addToFav = document.getElementById('addToFav');
let addToWish = document.getElementById('addToWish');
let searchBar = document.getElementById('searchbar');
let favList = document.getElementById('favList');
let wishList = document.getElementById('wishList');
var previousPin;


function openMore(locationId){
    
    locationDesc.textContent='';
    if (previousPin != locationId) {
        previousPin = locationId
        loadNew(locationId);
    }
    for (let b of descButtons){
        b.querySelector('span').classList.remove('active');
    }
    
    locationBlock.classList.remove('not-visible');
}

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
                route.spliceWaypoints(1,1,markers[locationinfoID.textContent-1].getLatLng());
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
            if (response[8]==true){
                addToFav.classList.add('square-active');
            }else{
                addToFav.classList.remove('square-active');
            }
            if (response[9]==true){
                addToWish.classList.add('square-active');
            }else{
                addToWish.classList.remove('square-active');
            }

        },
        error: function(){
            console.log('eeror');
        },
    });
}
function closeMore(){
    locationBlock.style.outline = 'none';
    locationBlock.classList.add('not-visible'); 
}
function addToDB(where){
    if(getCookie('userID')!==null){
        $.ajax({
            type: "POST",
            url: '../php/addTo'+where+'.php',
            data: {user:getCookie('userID'),pin_id:locationinfoID.textContent},
            success: function (response) {
                if (where == 'Favourites'){
                    favList.innerHTML = "";
                }else{
                    wishList.innerHTML = "";
                }
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
                    if (where == 'Favourites'){
                        favList.appendChild(div);
                    }else{
                        wishList.appendChild(div);
                    }
                });
                loadNew(locationinfoID.textContent);
            },
        });
    }
    
}
addToFav.onclick = function(){
    addToDB('Favourites');
}
addToWish.onclick = function(){
    addToDB('Wishlist');
}

searchBar.oninput = function(){
    $.ajax({ 
        type: 'POST',
        url: '../php/loadMoreLocations.php',  
        data:{start:0, search:searchBar.value},
        success: function(data){
            locList.innerHTML='';
            data.forEach(element => {
            var div = document.createElement('div')
            div.innerHTML=`<div class='landmark' onclick='openMore("`+element[0]+`")'>
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
            locList.appendChild(div);
            });
        }
    });
}
function CleanInput(id){
    document.getElementById(id).value="";
    $.ajax({ 
        type: 'POST',
        url: '../php/loadMoreLocations.php',  
        data:{start:0, search:searchBar.value},
        success: function(data){
            locList.innerHTML='';
            data.forEach(element => {
            var div = document.createElement('div')
            div.innerHTML=`<div class='landmark' onclick='openMore("`+element[0]+`")'>
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
            locList.appendChild(div);
            });
        }
    });
}