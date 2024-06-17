<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    $user = $_POST['user'];
    $pin = $_POST['pin_id'];
    $query=mysqli_query($link,"SELECT * FROM `favourite` WHERE `user_id`='$user' AND `pins_id`='$pin'");
    $numrows=mysqli_num_rows($query);
    if($numrows==0)
    {
        $query = "INSERT INTO `favourite` (`user_id`, `pins_id`) VALUES ('$user', '$pin')";
        mysqli_query($link, $query);
    }
    else
    {
        $query = "DELETE FROM `favourite` WHERE `user_id`='$user' AND `pins_id`='$pin'";
        mysqli_query($link, $query);
    }

    $pinData = array();
    $query=mysqli_query($link,"SELECT `pins_id` FROM `favourite` WHERE `user_id`=".$user);
    $result = mysqli_fetch_all($query);
    if (isset($result)){
        foreach($result as $r){
            $query=mysqli_query($link,"SELECT * FROM `pins` WHERE `id`=".$r[0]);
            array_push($pinData, mysqli_fetch_array($query));
        }
    }
    echo json_encode($pinData);
    mysqli_close($link);
?>