
<div class="profile-frame">
    <?php
        if(!isset($_COOKIE["userlogin"])){ 
            echo'<div class="need-auth">
                Для полноцнного использования сайта необходима авторизация
            </div>';
        }else{   
            require('connectToDB.php');
            $query=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='".$_COOKIE['userID']."'");
            $getUser = mysqli_fetch_array($query);
            if (isset($getUser[7])){
                $userLogo = $getUser[7];
            }else{
                $userLogo = 'not-login-user.jpg';
            }
            mysqli_close($link);
            
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

<div class="buttons-tab" id="profile-buttons">
    <div class="button-item" id="achievements" ><span>Достижения</span></div>
    <div class="button-item" id="wishlist" ><span>Хочу песетить </span></div>
    <div class="button-item" id="favorite" ><span>Любимое</span></div>
    <div class="button-item" id="friends" ><span>Друзья</span></div>
</div>
<?php

function loadPins($where){
    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT `pins_id` FROM `".$where."` WHERE `user_id`=".$_COOKIE['userID']);
    $result = mysqli_fetch_all($query);
    if (isset($result)){
        foreach($result as $r){
            $query=mysqli_query($link,"SELECT * FROM `pins` WHERE `id`=".$r[0]);
            $result = mysqli_fetch_array($query);
            echo"
            <div class='landmark' onclick='openMore(".$result[0].")'>
                <div class='landmark-info'>  
                    <div class='landmark-name'>
                        <div>".$result[1]."</div>
                    </div>

                    <div class='landmark-description'>
                        <div>".$result[7]."</div>
                    </div>

                    <div class='landmark-misc'>
                        <div>".$result[5]."
                        ".$result[6]."</div>
                    </div>
                </div>
                <img class='photo-landmark' src='".$result[4]."' alt='photo landmark' width='166px' height='110px'>
            </div>
            ";
        }
    }
    
    mysqli_close($link);
}

if(!isset($_COOKIE["userlogin"])){ 
    echo'<div class="need-auth">
        Для полноцнного использования сайта необходима авторизация
    </div>';
}else{
echo'
<div class="location-list wishlist not-visible" id="wishList">
';
    loadPins('wish');
echo'
</div>
<div class="location-list favorite not-visible" id="favList">
';
    loadPins('favourite');
echo'
</div>

<div class="achievements not-visible">
'; 
    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT `achievement_id` FROM `achievementLink` WHERE `user_id`=".$_COOKIE['userID']);
    $resultSet = mysqli_fetch_all($query);
    foreach($resultSet as $row => $id){
        $query=mysqli_query($link,"SELECT * FROM `achievements` WHERE `id`=".$id[0]);
        $res = mysqli_fetch_all($query);
        foreach ($res as $achievement){
            echo'
            <div class="achievement">
                <div class="achievement-logo">
                    <img src="../img/achievements/'.$achievement[3].'" width="160px" height="160px"> 
                </div>
                <div class="achievement-description" >
                    <span class="achievement-name">'.$achievement[1].'</span>
                    <span>'.$achievement[2].'</span>
                </div>
            </div>
            ';
        }
        
    }
    mysqli_close($link);
echo'
</div>

<div class="friends not-visible">
    <div class="add-friend-button" onclick="showFriendAdd()">
        <p class="friend-add">Добавить друга</p>
    </div>
    <div class="friends-box" id="friendsList ">
    '; 

    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT `friend_id` FROM `friends` WHERE `user_id`=".$_COOKIE['userID']);
    $resultSet = mysqli_fetch_all($query);
    
    foreach($resultSet as $id => $row){
        $userid = $row[0];
        $query=mysqli_query($link,"SELECT * FROM `users` WHERE `id`=".$userid);
        $res = mysqli_fetch_array($query);
        $friendname = $res[1];
        $friendLogo = $res[7];
        echo '
        <div class="friendlist-placement" onClick="openProfile('.$userid.')">
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
