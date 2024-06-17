<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    $pinData =array();
    if (isset($_POST['type'])){
        if ($_POST['type']=='markers'){
            $query=mysqli_query($link,"SELECT `position`,`id` FROM `pins`");
            $pins = mysqli_fetch_all($query);
            foreach ($pins as $pin){
                $temp =explode(", ",$pin[0]);
                array_push($temp, $pin[1]);
                array_push($pinData, $temp);
            }
        }
    }
    
    echo json_encode($pinData);
    mysqli_close($link);
?>