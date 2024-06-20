let buttons = document.getElementById('profile-buttons').querySelectorAll('.button-item');
let friends = document.getElementById('friendsList');
let ap = document.getElementById('anotherProfile');
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
function addFriend(){
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

function openProfile(userID){
    $.ajax({
        type: "POST",
        url: '../php/loadprofile.php',
        data: {id: userID},
        success: function (response) {
            ap.innerHTML='';
            var div = document.createElement('div');
            div.className='another-profile-frame';
            ap.appendChild(div);
            var div1 = document.createElement('div');
            div1.className='buttons-tab';
            div1.id='profile-buttons';
            div1.innerHTML=`<div class="button-item" id="achievements" ><span>Достижения</span></div>
            <div class="button-item" id="wishlist" ><span>Хочу песетить </span></div>
            <div class="button-item" id="favorite" ><span>Любимое</span></div>
            <div class="button-item" id="friends" ><span>Друзья</span></div>`;
            ap.appendChild(div1);

            
            console.log(response);
            ap.classList.remove('not-visible');
            ap.querySelector('.another-profile-frame').innerHTML = response[0];
            response.forEach(element => {
                if (element!=response[0]){
                    var div = document.createElement('div');
                    div.innerHTML = element;
                    ap.appendChild(div.firstChild);
                }
            });    
            let apbuttons = ap.querySelector('.buttons-tab').querySelectorAll('.button-item');
            for (let b of apbuttons){
                b.onclick = function(){
                    if (getCookie('userlogin')){
                        if (b.querySelector('span').className==('active'))
                        {
                            b.querySelector('span').classList.remove('active');
                            ap.querySelector('.'+b.id).classList.add('not-visible');
                        }
                        else{
                            for (let b1 of apbuttons){
                                b1.querySelector('span').classList.remove('active');
                                ap.querySelector('.'+b1.id).classList.add('not-visible');
                            }
                            b.querySelector('span').classList.add('active');
                            ap.querySelector('.'+b.id).classList.remove('not-visible');
                        }
                    }
                }
            }
            
        },
    });
}