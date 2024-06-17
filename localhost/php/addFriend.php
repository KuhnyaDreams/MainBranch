<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    $user = $_POST['user'];
    $friend = $_POST['friend'];
    $query=mysqli_query($link,"SELECT * FROM `friends` WHERE `user_id`='$user' AND `friend_id`='$friend'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0 && $user !== $friend)
    {
        $query=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='$friend'");
        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        {   
            $query = "INSERT INTO `friends` (`user_id`, `friend_id`) VALUES ('$user', '$friend')";
            mysqli_query($link, $query);
            $response = 'success';
        }
    }
    else
    {
        $response = "error";
    }
    $friendsData = array();
    $query=mysqli_query($link,"SELECT * FROM `friends` WHERE `user_id`=".$_COOKIE['userID']);
    $resultSet = mysqli_fetch_all($query);
    foreach($resultSet as $id => $row){
        $userid = $row[1];
        $query=mysqli_query($link,"SELECT `Login`,`id`,`User_logo` FROM `users` WHERE `id`=".$userid);
        $res = mysqli_fetch_array($query);
        array_push($friendsData, $res);
    }
    echo json_encode($friendsData);
    mysqli_close($link);
?>