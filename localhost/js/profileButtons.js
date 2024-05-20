let buttons = document.querySelectorAll('.profile-item');

for (let b of buttons){
    b.onclick = function(){
        if (getCookie('userlogin')){
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
}

function showFriendAdd(){ 
    $('#addFriend').toggleClass('not-visible');  
}

$("#friendCode").keyup(function(event){
    if(event.keyCode == 13){
        console.log(getCookie('userID'));
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: '../php/addFriend.php',
            data: {user:getCookie('userID'), friend:$('#friendCode').val()},
            success: function (response) {
                console.log(response);
                location.reload();
            },
            error: function(){
                console.log('eeror');
            },
        });
    }
});

$('#addFriend').click(function(e) {
    if(e.target != $('#addForm')) {
        showFriendAdd();
    }
});
$('#addForm').click(function(e){
    e.stopPropagation();
}
);