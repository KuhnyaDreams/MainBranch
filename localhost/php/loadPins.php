<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');


    $query=mysqli_query($link,"SELECT `position`, `pin_id` FROM `Pins`");
    $pins = mysqli_fetch_all($query);
    $pinpos =array();
    foreach ($pins as $pos){
        $temp =explode(", ",$pos[0]);
        array_push($temp, $pos[1]);
        array_push($pinpos, $temp);
    }
    
    echo json_encode($pinpos);
    mysqli_close($link);
?>