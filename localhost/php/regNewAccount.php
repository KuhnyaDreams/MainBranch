<?php
    header('Content-Type: application/json');
    require_once('connectToDB.php');
    if (isset($_POST['password']) && isset($_POST['login'])){  
        $login = $_POST['login'];
        $psw = $_POST['password'];
        $query=mysqli_query($link,"SELECT * FROM `Users` WHERE `login`='$login'");
        $numrows=mysqli_num_rows($query);
        if($numrows==0)
        {
            $sql = "INSERT INTO `Users` (`login`, `password`) VALUES ('$login', '$psw')";
            mysqli_query($link, $sql);
        } else {
            $response = "That username already exists! Please try another one!";
            echo json_encode($response);
        }
    }
    mysqli_close($link);
?>
