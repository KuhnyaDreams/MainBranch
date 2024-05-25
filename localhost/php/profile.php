<div class="profile-frame">
    <?php
        if(!isset($_COOKIE["userlogin"])){ 
            echo'<div class="need-auth">
                Для полноцнного использования сайта необходима авторизация
            </div>';
        }else{    
            echo'<div class="avatar">
                    <img src="../userContent/'.$userLogo.'" alt="avatar" width="80px" height="80px">
                </div>

                <div class="profile-name">
                    <div class="user-name">Логин: <span id="loginProfile">'.$_COOKIE["userlogin"].'</span></div>
                    <div class="invite-code">Код для друзей <span id="loginID">'.$_COOKIE["userID"].'</span></div>
                </div>
            ';
        }
    ?>
</div>

<div class="profile-info">
    <div class="profile-item" id="my-pins" ><span> Мои места </span></div>
    <div class="profile-item" id="achievements" ><span>Достижения </span></div>
    <div class="profile-item" id="want-visit" ><span>Хочу песетить </span></div>
    <div class="profile-item" id="favorite" ><span>Любимое</span></div>
    <div class="profile-item" id="friends" ><span>Друзья</span></div>
</div>

<?php
if(!isset($_COOKIE["userlogin"])){ 
    echo'<div class="need-auth">
        Для полноцнного использования сайта необходима авторизация
    </div>';
}else{

echo'
<div class="want-visit not-visible">
    <div class="landmark">
        <div class="lanmark-info">  
            <div class="landmark-name">
                <div >Ельцин Центр</div>
            </div>

            <div class="landmark-description">
                <div>Культурный центр, музей</div>
            </div>

            <div class="landmark-misc">
                <div>Открыто до 21:00
                    Ул.Бориса Ельцина, 3</div>
            </div>
        </div>
        <div class="photo-landmark">
            <img src="img/photo-landmark.jpg" alt="photo landmark" width="170px" height="110px">
        </div>
    </div>
</div>
<div class="favorite not-visible">
    <div class="landmark">
        <div class="lanmark-info">  
            <div class="landmark-name">
                <div >Ельцин Центр</div>
            </div>

            <div class="landmark-description">
                <div>Культурный центр, музей</div>
            </div>

            <div class="landmark-misc">
                <div>Открыто до 21:00
                    Ул.Бориса Ельцина, 3</div>
            </div>
        </div>
        <div class="photo-landmark">
            <img src="img/photo-landmark.jpg" alt="photo landmark" width="170px" height="110px">
        </div>
    </div>
</div>
<div class="my-pins not-visible">
    <div class="landmark">
        <div class="lanmark-info">  
            <div class="landmark-name">
                <div >Ельцин Центр</div>
            </div>

            <div class="landmark-description">
                <div>Культурный центр, музей</div>
            </div>

            <div class="landmark-misc">
                <div>Открыто до 21:00
                    Ул.Бориса Ельцина, 3</div>
            </div>
        </div>
        <div class="photo-landmark">
            <img src="img/photo-landmark.jpg" alt="photo landmark" width="170px" height="110px">
        </div>
    </div>
</div>

<div class="achievements not-visible">
    <div class="achievement">
        <div class="achievement-logo">
            <img src="../img/achievement.png" width="40px" height="40px"> 
        </div>
        <div class="achievement-description" >
            <span>Название достижения</span>
            <span>Описание достижения</span>
        </div>
    </div>
</div>
<div class="friends not-visible">
    <div class="add-friend-button" onclick="showFriendAdd()">
        <p class="friend-add">Добавить друга</p>
    </div>
    <div class="friends-box">
    '; 

    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT * FROM `friends` WHERE `user_id`=".$_COOKIE['userID']);
    $resultSet = mysqli_fetch_all($query, MYSQLI_BOTH);
    
    foreach($resultSet as $id => $row){
        $userid = $row['friend_id'];
        $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `user_id`=".$userid);
        $res = mysqli_fetch_array($query);
        $friendname = $res['Login'];
        $friendLogo = $res['User_logo'];
        echo '
        <div class="friendlist-placement">
            <div class="user-info">
                <img src="./userContent/'.$friendLogo.'" alt="avatar" class="avatar-user"  width="80px" height="80px">

                <div class="user-name" >
                    '.$friendname.'
                </div>
            </div>
        </div>
        ';
    }
    mysqli_close($link);
    echo'</div>
    </div>';
}
?>