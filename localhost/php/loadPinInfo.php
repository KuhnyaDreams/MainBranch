<?php
    header('Content-Type: application/json');
    require('connectToDB.php');
    $id = $_POST['pin_id'];
    $query=mysqli_query($link,"SELECT * FROM `pins` WHERE `id`='$id'");
    $response = mysqli_fetch_array($query);
    $query= mysqli_query($link,"SELECT * FROM `favourite` WHERE `user_id`=".$_COOKIE['userID']." AND `pins_id`=".$id);
    if (mysqli_num_rows($query)!=0){
        array_push($response,TRUE);
    }else{
        array_push($response,FALSE);
    }
    $query= mysqli_query($link,"SELECT * FROM `wish` WHERE `user_id`=".$_COOKIE['userID']." AND `pins_id`=".$id);
    if (mysqli_num_rows($query)!=0){
        array_push($response,TRUE);
    }else{
        array_push($response,FALSE);
    }
    echo json_encode($response);
    mysqli_close($link);
?>