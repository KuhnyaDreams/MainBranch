<?php
    header('Content-Type: application/json');
    require('connectToDB.php');
    $id = $_POST['pin_id'];
    $query=mysqli_query($link,"SELECT * FROM `Pins` WHERE `Pin_id`='$id'");
    $response = mysqli_fetch_array($query);
    echo json_encode($response);
    mysqli_close($link);
?>