<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    if (isset($_POST['password'])){  
        $login = $_POST['login'];
        $psw = $_POST['password'];
        $sql = "INSERT INTO `Users` (`login`, `password`) VALUES ('$login', '$psw')";
        mysqli_query($link, $sql);
    }
    mysqli_close($link);
    
?>