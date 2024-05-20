<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    $user = $_POST['user'];
    $friend = $_POST['friend'];
    $query=mysqli_query($link,"SELECT * FROM `friends` WHERE `user_id`='$user' AND `friend_id`='$friend'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
    {
        $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `user_id`='$friend'");
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
    echo json_encode($response);
    mysqli_close($link);
?>