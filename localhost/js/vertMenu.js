let menu = document.querySelector('.left-menu');
let mButton = document.getElementById('menu');

function ShowMenu(){
    if (menu.className =="left-menu not-visible")
    {
        menu.classList.remove('not-visible');
    }else{
        menu.classList.add('not-visible');
    }

}