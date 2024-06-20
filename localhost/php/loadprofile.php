<?php 
    header('Content-Type: application/json');
    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='".$_POST['id']."'");
    $getUser = mysqli_fetch_array($query);
    
    $result = array();

    $divOne = '<div class="avatar">
            <img src="../userContent/'.$getUser[7].'" alt="avatar" width="80px" height="80px">
        </div>
        <div class="profile-name">
            <div class="user-name">Логин: <span id="loginProfile">'.$getUser[1].'</span></div>
            <div class="invite-code">Код для друзей <span id="loginID">'.$getUser[0].'</span></div>
        </div>
    ';
    array_push($result,$divOne);

    function loadPins($where){
        require('connectToDB.php');
        $query=mysqli_query($link,"SELECT `pins_id` FROM `".$where."` WHERE `user_id`=".$_POST['id']);
        $result = mysqli_fetch_all($query);
        $achres = array();
        if (isset($result)){
            foreach($result as $r){
                $query=mysqli_query($link,"SELECT * FROM `pins` WHERE `id`=".$r[0]);
                $result = mysqli_fetch_array($query);
                $str = "
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
                array_push($achres,$str);
            }
        }
        return $achres;
    }

    function loadAchievements(){
        require('connectToDB.php');
        $query=mysqli_query($link,"SELECT `achievement_id` FROM `achievementLink` WHERE `user_id`=".$_POST['id']);
        $resultSet = mysqli_fetch_all($query);
        $achres = array();
        foreach($resultSet as $row => $id){
            $query=mysqli_query($link,"SELECT * FROM `achievements` WHERE `id`=".$id[0]);
            $res = mysqli_fetch_all($query);
            foreach ($res as $achievement){
                $str ='
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
                array_push($achres,$str);
            } 
        }
        return $achres;
    }

    function loadFriends(){
        require('connectToDB.php');
        $query=mysqli_query($link,"SELECT `friend_id` FROM `friends` WHERE `user_id`=".$_POST['id']);
        $resultSet = mysqli_fetch_all($query);
        $achres = array();
        foreach($resultSet as $id => $row){
            $userid = $row[0];
            $query=mysqli_query($link,"SELECT * FROM `users` WHERE `id`=".$userid);
            $res = mysqli_fetch_array($query);
            $friendname = $res[1];
            $friendLogo = $res[7];
            $str = '<div class="friendlist-placement" onClick="openProfile('.$res[0].')">
                <div class="user-info">
                    <img src="./userContent/'.$friendLogo.'" alt="avatar" class="avatar-user"  width="80px" height="80px">
    
                    <div class="user-name" >
                        '.$friendname.'
                    </div>
                </div>
            </div>
            ';
            array_push($achres,$str);
        }
        return $achres;
    }
    $divTwo = '<div class="achievements not-visible">'.implode(' ',loadAchievements()).'</div>';
    array_push($result,$divTwo);
   
    $divThree = '<div class="location-list wishlist not-visible" id="wishList">'.implode(' ',loadPins('wish')).'</div>';
    array_push($result,$divThree);
    
    $divFour = '<div class="location-list favorite not-visible" id="favList">'
    .implode(' ',loadPins('favourite')).'</div>';
    array_push($result,$divFour);
    
    $divFive ='<div class="friends not-visible">
    <div class="friends-box" id="anotherFriendsList">
    '.implode(' ',loadFriends()).'</div></div>';
    array_push($result,$divFive);
    
    echo json_encode($result);
    mysqli_close($link);
?>