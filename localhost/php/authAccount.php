<?php
    header('Content-Type: application/json');
    require('connectToDB.php');
    $login = $_POST['login'];
    $psw = $_POST['password'];
    $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `login`='$login' AND `password`='$psw'");
    $numrows=mysqli_num_rows($query);
    if($numrows>0)
    {
        $getUser = mysqli_fetch_array($query);
        setcookie("userlogin", $getUser[1], time()+(60*60*24), '/');  
        setcookie("userID", $getUser[0], time()+(60*60*24), '/');
        $response = 'success';
    }
    else
    {
        $response = "error";
    }
    echo json_encode($response);
    mysqli_close($link);
?>
