<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    if (isset($_POST['search']) && $_POST['search']!='')
    {
        $query=mysqli_query($link,"SELECT * FROM `pins` WHERE `Name` RLIKE '".$_POST['search']."' OR `tags` RLIKE '".$_POST['search']."' OR `address` RLIKE '".$_POST['search']."' ORDER BY `id`");
    }
    else
    {
        $query=mysqli_query($link,"SELECT * FROM `pins` ORDER BY `id`");
    }
    $pins = mysqli_fetch_all($query);
    echo json_encode($pins);
    mysqli_close($link);


?>