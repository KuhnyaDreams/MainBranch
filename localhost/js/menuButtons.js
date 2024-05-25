let routeBlock = document.getElementById('route');
let leaderBlock = document.getElementById('leaderboard');
let profileBlock = document.getElementById('profile');
let settingsBlock = document.getElementById('settings');
let locationsBlock = document.getElementById('locations');
let blocks = document.querySelectorAll('.menu-content');

function HideAll(){
    blocks.forEach(element => {
        element.classList.add('not-visible');
    });
}

function ShowRoute(){
    if (routeBlock.classList[1] == 'not-visible')
    {
        HideAll();
        routeBlock.classList.remove('not-visible');
    }
    else
    {
        HideAll();
    }
}
function ShowLeaderboard(){
    if (leaderBlock.classList[1] == 'not-visible')
    {
        HideAll();
        leaderBlock.classList.remove('not-visible');
    }
    else
    {
        HideAll();
    }
}
function ShowAccount(){
    if (profileBlock.classList[1] == 'not-visible')
    {
        HideAll();
        profileBlock.classList.remove('not-visible');
    }
    else
    {
        HideAll();
    }
}
function ShowSettings(){
    if (settingsBlock.classList[1] == 'not-visible')
    {
        HideAll();
        settingsBlock.classList.remove('not-visible');
    }
    else
    {
        HideAll();
    }
}
function ShowLocations(){
    if (locationsBlock.classList[1] == 'not-visible')
    {
        HideAll();
        locationsBlock.classList.remove('not-visible');
    }
    else
    {
        HideAll();
    }
}