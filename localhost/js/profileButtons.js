let buttons = document.getElementById('profile-buttons').querySelectorAll('.button-item');
let friends = document.getElementById('friendsList');
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
                friends.innerHTML ="";
                response.forEach(element => {
                    let div = document.createElement('div');
                    div.innerHTML = ` 
                    <div class="friendlist-placement">
                        <div class="user-info">
                            <img src="./userContent/`+element[2]+`" alt="avatar" class="avatar-user"  width="80px" height="80px">
                            <div class="user-name" >
                            `+element[0]+`
                            </div>
                        </div>
                    </div>`;
                    friends.appendChild(div);
                });
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