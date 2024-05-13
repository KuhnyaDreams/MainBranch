let routeBlock = document.getElementById('route');
let leaderBlock = document.getElementById('leaderboard');
let profileBlock = document.getElementById('profile');
let settingsBlock = document.getElementById('settings');
function ShowRoute(){
    if (routeBlock.className == 'route not-visible')
    {
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        settingsBlock.classList.add('not-visible');
        routeBlock.classList.remove('not-visible');
    }
    else
    {
        settingsBlock.classList.add('not-visible');
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}
function ShowLeaderboard(){
    if (leaderBlock.className == 'leaderboard not-visible')
    {
        settingsBlock.classList.add('not-visible');
        leaderBlock.classList.remove('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
    else
    {
        settingsBlock.classList.add('not-visible');
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}
function ShowAccount(){
    if (profileBlock.className == 'profile not-visible')
    {
        settingsBlock.classList.add('not-visible');
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.remove('not-visible');
        routeBlock.classList.add('not-visible');
    }
    else
    {
        settingsBlock.classList.add('not-visible');
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}
function ShowSettings(){
    if (settingsBlock.className == 'settings not-visible')
    {
        settingsBlock.classList.remove('not-visible');
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
    else
    {
        settingsBlock.classList.add('not-visible');
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}