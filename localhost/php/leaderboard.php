<div class="leaderboard-placement" id="user">
    <?php
    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT `id`,`login`,`user_logo`,`visited` FROM `users` ORDER BY `visited` DESC");
    $res = mysqli_fetch_all($query);
    mysqli_close($link);
        if(!isset($_COOKIE["userlogin"])){ 
            echo'<div class="need-auth">
                Для полноцнного использования сайта необходима авторизация
            </div>';
        }else{
            for ($i=0; $i<count($res); $i++){
                if ($res[$i][0]==$_COOKIE['userID']){
                    echo"
                        <div class='leaderboard-place'>
                            ".($i+1)."
                        </div>
                        <img src='../userContent/".$res[$i][2]."' alt='avatar' class='avatar-user' width='80px' height='80px'>

                        <div class='leaderboard-user'>
                            ".$res[$i][1]."
                        </div>
                    
                        <div class='visited'>
                        ".$res[$i][3]."
                        </div>
                    "; 
                }
            }
            
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

<div class="leaderboard-list">
    <?php for ($i=0; $i<count($res); $i++){
        echo"
            <div class='leaderboard-placement' id='other'>
                <div class='leaderboard-place'>
                    ".($i+1)."
                </div>
                <img src='../userContent/".$res[$i][2]."' alt='avatar' class='avatar-user' width='80px' height='80px'>

                <div class='leaderboard-user'>
                    ".$res[$i][1]."
                </div>
            
                <div class='visited'>
                ".$res[$i][3]."
                </div>
            </div>
        ";     
    }?>
</div>