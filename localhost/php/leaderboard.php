<div class="leaderboard-placement" id="user">
    <?php if(!isset($_COOKIE["userlogin"])){ 
            echo'<div class="need-auth">
                Для полноцнного использования сайта необходима авторизация
            </div>';
        }else{
            echo'
            <div class="place">
                43
            </div>
            <img src="../userContent/'.$userLogo.'" alt="avatar" class="avatar-user" width="80px" height="80px">

            <div class="leaderboard-user">
                '.$_COOKIE["userlogin"].'
            </div>
        
            <div class="visited">
                27
            </div>
            ';
        }
    ?>
</div>

<div class="leaderboard-info">
    <p class="leaderboard-title">
        Место
    </p>

    <p class="leaderboard-title">
        Пользователь
    </p>

    <p class="leaderboard-title">
        Посетил
    </p>
</div>

<div class="leaderboard-placement" id="other">
    
    <div class="place">
        1
    </div>

    <img src="img/not-login-user.jpg" alt="avatar" class="avatar-user" width="80px" height="80px">
    <div class="leaderboard-user">
        Логин
    </div>
    <div class="visited">
        1488
    </div>
  
</div>
