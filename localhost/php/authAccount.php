<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');

    if (isset($_POST['password']) && isset($_POST['login'])){  
        $login = $_POST['login'];
        $psw = $_POST['password'];
        $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `login`='$login' AND `password`='$psw'");
        setcookie("userlogin", $query['login'], time()+60*60);
    }
    mysqli_close($link);
?>
