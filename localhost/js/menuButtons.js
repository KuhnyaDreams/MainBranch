let routeBlock = document.getElementById('route');
let leaderBlock = document.getElementById('leaderboard');
let profileBlock = document.getElementById('profile');
function ShowRoute(){
    if (routeBlock.className == 'route not-visible')
    {
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.remove('not-visible');
    }
    else
    {
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}
function ShowLeaderboard(){
    if (leaderBlock.className == 'leaderboard not-visible')
    {
        leaderBlock.classList.remove('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
    else
    {
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}
function ShowAccount(){
    if (profileBlock.className == 'profile not-visible')
    {
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.remove('not-visible');
        routeBlock.classList.add('not-visible');
    }
    else
    {
        leaderBlock.classList.add('not-visible');
        profileBlock.classList.add('not-visible');
        routeBlock.classList.add('not-visible');
    }
}