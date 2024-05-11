let buttons = document.querySelectorAll('.profile-item');

for (let b of buttons){
    b.onclick = function(){
        if (b.className==('profile-item active'))
        {
            b.classList.remove('active');
            document.querySelector('.'+b.id).classList.add('not-visible');
        }
        else{
            for (let b1 of buttons){
                b1.classList.remove('active');
                document.querySelector('.'+b1.id).classList.add('not-visible');
            }
            b.classList.add('active');
            document.querySelector('.'+b.id).classList.remove('not-visible');
        }
    }
}