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

