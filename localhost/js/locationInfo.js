let locationImage = document.getElementById('locationInfoImage');
let locationName = document.getElementById('locationInfoName');
let locationTags = document.getElementById('locationInfoTags');
let locationBlock = document.getElementById('locationInfoBlock');
var previousPin;
function openMore(locationId){
    locationBlock.classList.remove('not-visible');
    if (previousPin != locationId) {
        previousPin = locationId
        loadNew(locationId);
    }
}
function loadNew(locationId){
    console.log('calledSQL');
    $.ajax({
        type: "POST",
        url: '../php/loadPinInfo.php',
        data: {pin_id:locationId},
        success: function (response) {
            locationImage.src=response[4];
            locationName.textContent=response[1];
            locationTags.textContent=response[7];
        },
        error: function(){
            console.log('eeror');
        },
    });
}
function closeMore(){
    locationBlock.classList.add('not-visible');
}