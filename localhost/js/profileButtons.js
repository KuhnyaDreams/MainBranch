let buttons = document.querySelectorAll('.profile-item');

for (let b of buttons){
    b.onclick = function(){
        if (b.querySelector('span').className==('active'))
        {
            b.querySelector('span').classList.remove('active');
            document.querySelector('.'+b.id).classList.add('not-visible');
        }
        else{
            for (let b1 of buttons){
                b1.querySelector('span').classList.remove('active');
                document.querySelector('.'+b1.id).classList.add('not-visible');
            }
            b.querySelector('span').classList.add('active');
            document.querySelector('.'+b.id).classList.remove('not-visible');
        }
    }
}